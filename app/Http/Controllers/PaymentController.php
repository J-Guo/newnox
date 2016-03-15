<?php

namespace App\Http\Controllers;

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

        return view('affiliate.request-payment');
    }

    /**
     * show specific request payment page for affiliate
     * @return View
     */
    public function showRequestPayment(){

        return view('affiliate.request');
    }
}
