<?php

Route::group(['middleware'=>'web'],function(){

    //show login pages for both user and affiliate
    Route::get('login','PagesController@showLoginPage');

    //show otp page for both user and affiliate
    Route::get('otp', 'PagesController@showOTPPage');
    Route::post('otp', 'LoginController@sendOTP');

    //submit OTP and verifyit
    Route::post('verify','LoginController@verifyOTP');

    Route::get('logout','LoginController@handleLogout');


//    Route::get('signin','HomeController@showSignin');
//    Route::post('signin','HomeController@handleSignin');
//    Route::get('signout','HomeController@handleSignout');

    /*
     * Authentication middleware for both users and affiliates
     * Users and affiliates can access application until they login
     */
    Route::group(['middleware'=>['auth']],function(){


        /*
        * Entrust role middleware for users
        * only users can access the following pages
        */
        Route::group(['middleware'=>'role:user'],function(){

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



        //show main pages for user
        Route::get('main','PagesController@showMainPage');
        Route::get('main-listview','PagesController@showMainListviewPage');

        Route::post('main','PagesController@showMainPage');


        //show create profile page for user
        Route::post('reg-profile', 'PagesController@showUserRegProfile');
        //show create profile page for user
        Route::get('reg-profile', 'PagesController@showUserRegProfile');
        //create profile for new user
        Route::post('create-profile','UsersController@createProfile');

        //show date nearby page for user
        Route::get('date-near-by', 'PagesController@showDateNearby');
        //show date nearby page for user
        Route::post('date-near-by', 'PagesController@showDateNearby');

        //show payment detail page for user
        Route::get('payment-details', 'PagesController@showPaymentDetail');
        //show payment detail page for user
        Route::post('payment-details', 'PagesController@showPaymentDetail');

        //show assigned date for user
        Route::get('assigned-date', 'PagesController@showAssignedDate');
        //show assigned date for user
        Route::post('assigned-date', 'PagesController@showAssignedDate');

        //show profile page for user
        Route::post('user-profile', 'PagesController@showUserProfile');
        //show profile page for user
        Route::get('user-profile', 'UsersController@showUserProfile');
        //show edit profile page for usere
        Route::get('edit-profile','UsersController@showEditProfile');
        //hanlde user edit profile request
        Route::post('edit-profile','UsersController@editProfile');

        //show review page for user
        Route::post('reviews', 'PagesController@showUserReview');
        //show review page for user
        Route::get('reviews', 'PagesController@showUserReview');

        });


       /*
        * Entrust role middleware for affiliates
        * only affiliates can access the following pages
        */
        Route::group(['middleware'=>'role:affiliate'],function(){

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
        Route::get('aprofile', 'UsersController@showAProfile');
        //show edit profie page for affiliate
        Route::get('aprofile/edit', 'UsersController@showEditAProfile');
        //handle edit profile for affiliate
        Route::post('aprofile/edit', 'UsersController@editAProfile');

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


    //Unit Test Pages
    Route::get('test-image','ImagesController@getProfileImage');


});



