<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //show login page for both user and affiliate
    public function showLoginPage(){
        return view('auth.login-user');
    }

    //show otp page for both user and affiliate
    public function showOTPPage(){
        return view('auth.otp');
    }

    //show registration profile page for user
    public function showUserRegProfile(){

        return view('reg-profile');

    }

    //show main pages for user
    public function showMainPage(){
        return view('main');
    }

    //show list view of main pages for user
    public function showMainListviewPage(){
        return view('main-listview');
    }

    //show date nearby page for user
    public function showDateNearby(){
        return view('date-near-by');
    }

    //show payment detail page for user
    public function showPaymentDetail(){
        return view('payment-details');
    }

    //show assigned date for user
    public function showAssignedDate(){
        return view('assigned-date');
    }

    //show review page for user
    public function showUserReview(){
        return view('reviews');
    }

    //show FAQ page for affiliate
    public function showFAQ(){
        return view('affiliate.faq');
    }

    //show assigned task page for affiliate
    public function showAssignedTask(){
        return view('affiliate.assigned-task');
    }

    //show review page for affiliate
    public function showAReview(){
        return view('affiliate.reviews');
    }



}
