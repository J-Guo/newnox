<?php

namespace App\Http\Controllers;

use App\Models\Sent_Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

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

    //show payment detail page for user
    public function showPaymentDetail(){
        return view('payment-details');
    }


    /**
     * show reviews list for user
     * @return View
     */
    public function showUserReviewList(){

        //get all released ,not reviewed offers which are sent to current users
        $offers = Sent_Offer::where('status','released')
            ->whereHas('task',function($query){
                $query->where('task_poster',Auth::user()->id);
            })->get();

        //dd($offers);

        return view('reviews')->with('offers',$offers);
    }

    /**
     * show review page for user
     * @param offerid
     * @return View
     */
    public function showUserReview($offerid){

        return view('review');
    }

    //show FAQ page for affiliate
    public function showFAQ(){
        return view('affiliate.faq');
    }

    /**
     * show review page for affiliate
     * @return View
     */
    public function showAReviewList(){
        return view('affiliate.reviews');
    }

    /**
     * show review page for affiliate
     * @param offerid
     * @return View
     */
    public function showAReview($offerid){

        return view('affiliate.review');
    }



}
