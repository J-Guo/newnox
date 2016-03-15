<?php

namespace App\Http\Controllers;

use App\Models\Sent_Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentController extends Controller
{
    /**
     * show release payment list page for user
     * @return View
     */
    public function showReleasePaymentList(){

        return view('release-payment');

   }

    /**
     * show specific release payment page for user
     * @return View
     */
    public function showReleasePayment($taskid){



        return view('release');

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
        return redirect('request-payment');

    }
}
