<?php


Route::group(['middleware'=>'web'],function(){


    Route::get('signin','HomeController@showSignin');
    Route::post('signin','HomeController@handleSignin');
    Route::get('signout','HomeController@handleSignout');

    Route::group(['middleware'=>'auth'],function(){

        /*
        |--------------------------------------------------------------------------
        | Clients Routes File
        |--------------------------------------------------------------------------
        |
        | Here is where you will register all of the routes in an application.
        | It's a breeze. Simply tell Laravel the URIs it should respond to
        | and give it the controller to call when that URI is requested.
        |
        */
        Route::get('/', function () {
            return view('welcome');
        });

        //show login pages for both user and affiliate
        Route::get('login','PagesController@showLoginPage');

        //show otp page for both user and affiliate
        Route::get('otp', 'PagesController@showOTPPage');

        //handle otp
        Route::post('otp', function () {
            return view('auth.otp');
        });

        //show main pages for user
        Route::get('main','PagesController@showMainPage');

        Route::post('main','PagesController@showMainPage');

        //show profile page for user
        Route::post('reg-profile', 'PagesController@showUserRegProfile');
        //show profile page for user
        Route::get('reg-profile', 'PagesController@showUserRegProfile');

        //show date nearby page for user
        Route::get('date-near-by', 'PagesController@showDateNearby');
        //show date nearby page for user
        Route::post('date-near-by', 'PagesController@showDateNearby');

        //show payment detail page for user
        Route::get('payment-details', 'PagesController@showPaymentDetail');
        //show payment detail page for user
        Route::post('payment-details', 'PagesController@showPaymentDetail');

        //show assigned date for user
        Route::get('asigned-task', 'PagesController@showAssignedDate');
        //show assigned date for user
        Route::post('asigned-task', 'PagesController@showAssignedDate');

        //show profile page for user
        Route::post('user-profile', 'PagesController@showUserProfile');
        //show profile page for user
        Route::get('user-profile', 'PagesController@showUserProfile');

        //show review page for user
        Route::post('reviews', 'PagesController@showUserReview');
        //show review page for user
        Route::get('reviews', 'PagesController@showUserReview');


        /*
        |--------------------------------------------------------------------------
        | Affiliate Routes File
        |--------------------------------------------------------------------------
        |
        */
        //show FAQ page for affiliate
        Route::get('faq', 'PagesController@showFAQ');

        //show personal detail page for affiliate
        Route::get('apersonal-detail', 'PagesController@showAPersonalDetail');

        //show profile page for affiliate
        Route::get('aprofile', 'PagesController@showAProfile');

        //show task nearby page for affiliate
        Route::get('task-nearby','PagesController@showTaskNearby');

        //show make offer page for affiliate
        Route::get('make-offer', 'PagesController@showMakeOffer');


        //show task list page for affiliate
        Route::get('task-list','PagesController@showTaskList');

        //show assigned task page for affiliate
        Route::get('assigned-task','PagesController@showAssignedTask');

        //show review page for affiliate
        Route::get('areviews','PagesController@showAReview');
    });


});



