<?php

namespace App\Http\Controllers;

use App\Models\Posted_Task;
use App\Models\Sent_Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Braintree;
use Braintree\ClientToken;
use Braintree\Configuration;
use Braintree\Transaction;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;
use Services_Twilio_RestException;

class PaymentController extends Controller
{
    use SmsTrait;

    /**
     * show braintree check for new user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBraintreeCheckout(Request $request){

        $user = Auth::user();

        if($user->braintree_id == null){
        //get environment values for braintree
        Configuration::environment('sandbox');
        Configuration::merchantId(config('services.braintree.merchant'));
        Configuration::publicKey(config('services.braintree.public'));
        Configuration::privateKey(config('services.braintree.secret'));

        //generate token to client side
        $clientToken = ClientToken::generate();
        return view('payment')
               ->with('clientToken',$clientToken);
        }
        else{
        return redirect('main'); //user cannot create payment method again
        }
    }

    /**
     * handle brantree checkout
     * create user and save information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleBraintreeCheckout(Request $request){

        //get environment values for braintree
        Configuration::environment('sandbox');
        Configuration::merchantId(config('services.braintree.merchant'));
        Configuration::publicKey(config('services.braintree.public'));
        Configuration::privateKey(config('services.braintree.secret'));

        //build validation for user input
        $v = Validator::make($request->all(), [
            'firstName' => 'required|alpha|max:255',
            'lastName' => 'required|alpha|max:255',
        ]);

        //if input is validate
        if (!$v->fails()){

            //get user information
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');
            $paymentNonce = $request->input('payment_method_nonce');

            //get current user
            $user = $request->user();

            //create braintree instance for user
            $result = Braintree\Customer::create([
                'firstName' =>  $firstName,
                'lastName' => $lastName,
                'phone' => $user->mobile,
                'paymentMethodNonce' =>  $paymentNonce
            ]);


            //if user created successful
            if($result->success){

                $user->braintree_id = $result->customer->id;
                $user->save();
                return redirect('date-near-by');

            }
            else{

                return redirect()->back()->with('braintree_errors',$result->errors->deepAll());
            }

        }
        else
        {
            return redirect()->back()->withErrors($v->errors());
        }

    }

    /**
     * show payment method modification page for user
     * @return View
     */
    public function showPaymentDetail(){

        //get environment values for braintree
        Configuration::environment('sandbox');
        Configuration::merchantId(config('services.braintree.merchant'));
        Configuration::publicKey(config('services.braintree.public'));
        Configuration::privateKey(config('services.braintree.secret'));

        //generate token to client side
        $clientToken = ClientToken::generate();
        //get current user
        $user = Auth::user();

        //if current user has braintree id
        if($user->braintree_id != null){
        //get braintree user
        $braintree_user  = Braintree\Customer::find($user->braintree_id);
        //get last 4 digits of current payment method
        $last4 = $braintree_user->paymentMethods[0]->last4;
        //get user name
        $firstName = $braintree_user->firstName;
        $lastName =  $braintree_user->lastName;

        return view('payment-details')
            ->with('clientToken',$clientToken)
            ->with('firstName',$firstName)
            ->with('lastName',$lastName)
            ->with('last4',$last4);
        }
        else
            return view('payment-details')
                ->with('clientToken',$clientToken);

    }

    /**
     * handle payment method modification for user
     * @param Request $request
     * @return View
     */
    public function editPaymentDetail(Request $request){

        //get environment values for braintree
        Configuration::environment('sandbox');
        Configuration::merchantId(config('services.braintree.merchant'));
        Configuration::publicKey(config('services.braintree.public'));
        Configuration::privateKey(config('services.braintree.secret'));

        //build validation for user input
        $v = Validator::make($request->all(), [
            'firstName' => 'required|alpha|max:255',
            'lastName' => 'required|alpha|max:255',
        ]);


        //if input is valid
        if (!$v->fails()) {

            //get user information
            $paymentNonce = $request->input('payment_method_nonce');
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');

            //get current user
            $user = $request->user();

            //if user has a braintree account
            if($user->braintree_id != null){

//            //create new payment method for user and set it as default
//            $result = Braintree\PaymentMethod::create([
//                'customerId' =>  $user->braintree_id,
//                'paymentMethodNonce' =>  $paymentNonce,
//                'options' => [
//                    'makeDefault' => true
//                ]
//            ]);

            //update user payment method and name
            $result = Braintree\Customer::update(
                $user->braintree_id,
                [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'creditCard' => [
                        'paymentMethodNonce' =>  $paymentNonce,
                        'options' => [
                            'makeDefault' => true
                        ]
                    ]
                ]
            );

            //if payment method update successful
            if($result->success){

                return redirect('payment-details')
                    ->with('message','Payment Method Updated!');

            }
            else
                return redirect()->back()->with('braintreeError',$result->message);
            }
            //if user has no braintree account, create one
            else{

                //create braintree instance for user
                $result = Braintree\Customer::create([
                    'firstName' =>  $firstName,
                    'lastName' => $lastName,
                    'phone' => $user->mobile,
                    'paymentMethodNonce' =>  $paymentNonce
                ]);


                //if user created successful
                if($result->success){

                    $user->braintree_id = $result->customer->id;
                    $user->save();
                    return redirect('date-near-by');

                }
                else{

                    return redirect()->back()->with('braintree_errors',$result->errors->deepAll());
                }

            }

        }
        //if user input is not valid
        else
            return redirect()->back()->withErrors($v->errors());

    }

    /**
     * handle confirm date action from user
     * @return View
     */
    public function confirmDate(Request $request){

        //get environment values for braintree
        Configuration::environment('sandbox');
        Configuration::merchantId(config('services.braintree.merchant'));
        Configuration::publicKey(config('services.braintree.public'));
        Configuration::privateKey(config('services.braintree.secret'));

        //get current user
        $user = $request->user();

        //get the offer id
        try {
            $offer_id = Crypt::decrypt($request->input('offer_id'));
        } catch (DecryptException $e) {

            return redirect()->back();
        }

        //get posted task by this user
        $posted_task = Posted_Task::where('task_poster',$user->id)
            ->where('status','posted')
            ->first();

        //get the offer instance
        $sent_offer = Sent_Offer::find($offer_id);
        //get user braintree id
        $braintree_id = $user->braintree_id;
        //get braintree user
        $braintree_user  = Braintree\Customer::find($braintree_id);

        //charge existed braintree user
        $transaction_result = Transaction::sale([
            'amount' => $sent_offer->price,     //offer price
            'customerId' => $braintree_id,  //braintree user
        ]);

//        dd($transaction_result);

        if($transaction_result->success){

            //set current task is assigned and save it
            $posted_task->status = 'assigned';
            $sent_offer->status ='assigned';
            $posted_task->save();
            $sent_offer->save();

            /**
             * When a task has been assigend, the other offers sent to this task
             * should become expired
             */
            //get all other offers sent to this task
            $offers = Sent_Offer::where('posted_task_id',$posted_task->id)
                ->whereNotIn('status',['assigned']) //not assigned offer
                ->whereNotIn('id',[$sent_offer->id]) //not current offer assigned to this task
                ->get();

//            dd($offers);

            //expire these offers
            for($i= 0;$i<$offers->count();$i++){

                $offer = $offers[$i];
                $offer->status ="expired";
                $offer->save();

            }


            /**
             * When a task has been assigend,
             * Send a SMS to affiliate to notification
             */
            //get task poster mobile number
            $mobileNum = $sent_offer->sender->mobile;

            //set message body (OTP)
            $smsBody = "Your offer has been assigned! Please check it at ".
                config('services.environment.baseurl').
                "/assigned-task-list";

            //check user mobile phone number is correct or not
            //create message and send it
            try{

                $this->sendSMS($mobileNum,$smsBody);

                return redirect('assigned-date');

            }
            catch(Services_Twilio_RestException $e){
//            return redirect('task-list');
                echo $e;
            }

        }
        else
            return redirect()->back()
                ->with('transactionError',$transaction_result->message);

    }

    /**
     * show release payment list page for user
     * @return View
     */
    public function showReleasePaymentList(){


       /*
        * find all requesting offers which are sent to current user
        */
       $offers = Sent_Offer::where('status','requesting')
                            ->whereHas('task',function($query){
                                $query->where('task_poster',Auth::user()->id);
                             })->get();


        return view('release-payment')->with('offers',$offers);

   }

    /**
     * show specific release payment page for user
     * @return View
     */
    public function showReleasePayment($offerid){

        //find the specific offer that is need to release payment
        $offer = Sent_Offer::find(Crypt::decrypt($offerid));

        return view('release')->with('offer',$offer);

    }

    /**
     * handle release payment action for user
     * @return Redirector
     */
    public function handleReleasePayment(Request $request){

        $offer_id = $request->input('offerID');

        $offer = Sent_Offer::findOrFail($offer_id);

        $task = $offer->task;
        $offer->status = 'released';
        $task->status = 'released';
        $offer->save();
        $task->save();

        return redirect('reviews')->with('message','Payment has been released');

    }

    /**
     * show request payment list page for affiliate
     * @return View
     */
    public function showRequestPaymentList(){

        //get all assigned and requesting offers
        $offers = Sent_Offer::where('offer_maker',Auth::user()->id)
                            ->whereIn('status',['assigned','requesting'])
                            ->get();

//        dd($offers);
        return view('affiliate.request-payment')->with('offers',$offers);
    }

    /**
     * show specific request payment page for affiliate
     * @return View
     */
    public function showRequestPayment($offerid){

        //find the specific offer that is needed to request payment
        $offer = Sent_Offer::find($offerid);

        return view('affiliate.request')->with('offer',$offer);
    }

    /**
     * handle request payment action from affiliate
     * @param Request $request
     * @return Redirector
     */
    public function handleRequestPayment(Request $request){

        /**
         * Todo: validation should be here to avoid repeat payment request
         */

        $offer_id = $request->input('offerID');
        $offer = Sent_Offer::find($offer_id);
        $task = $offer->task;
//        $offer->status = 'requesting';
//        $task->status = 'requesting';
        $offer->status = 'requested';
        $task->status = 'requested';
        $offer->save();
        $task->save();

        /**
         * after payment request, a notification message should send to user
         * Some functiions should be done here
         */
        //get task poster mobile number
        $mobileNum = $offer->task->poster->mobile;

        //set message body (OTP)
        $smsBody = "Your payment for task has been released! Please make a review it at ".
            config('services.environment.baseurl').
            "/reviews. ".
             "If you have any problem with release payment, please fell free to contact us.";

        //check user mobile phone number is correct or not
        //create message and send it
        try{

            $this->sendSMS($mobileNum,$smsBody);

            //dd($request->input());
            return redirect('request-payment')
                ->with('message','Have asked for payment release');

        }
        catch(Services_Twilio_RestException $e){
//            return redirect('task-list');
            Log::error($e);
            echo $e;
        }


    }
}
