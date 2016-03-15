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
}
