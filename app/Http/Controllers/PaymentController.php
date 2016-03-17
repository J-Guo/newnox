<?php

namespace App\Http\Controllers;

use App\Models\Posted_Task;
use App\Models\Sent_Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
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

        return redirect('release-payment')->with('message','Payment has been released');

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
