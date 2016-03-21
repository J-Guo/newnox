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

class PaymentController extends Controller
{

    /**
     * show braintree check for new user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBraintreeCheckout(Request $request){

        //get the offer id
        //$offer_id = $request->input('offer_id');

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
            //get offer id
            $offer_id = $request->input('offer_id');

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
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

//        dd($transaction_result);

        if($transaction_result->success){

            //set current task is assigned and save it
            $posted_task->status = 'assigned';
            $sent_offer->status ='assigned';
            $posted_task->save();
            $sent_offer->save();

            return redirect('assigned-date');

        }
        else
            return redirect()->back()
                ->with('transaction_message',$transaction_result->message);

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

        $offer_id = $request->input('offerID');
        $offer = Sent_Offer::find($offer_id);
        $task = $offer->task;
        $offer->status = 'requesting';
        $task->status = 'requesting';
        $offer->save();
        $task->save();

        //dd($request->input());
        return redirect('request-payment')
            ->with('message','Have asked for payment release');

    }
}
