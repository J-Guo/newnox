<?php

Route::group(['middleware'=>'web'],function(){

    //show login pages for both user and affiliate
    Route::get('login','PagesController@showLoginPage');

    //show otp page for both user and affiliate
    Route::get('otp', 'PagesController@showOTPPage');
    Route::post('otp', 'LoginController@sendOTP');

    //submit OTP and verifyit
    Route::post('verify','LoginController@verifyOTP');

    //handle user logout
    Route::get('logout','LoginController@handleLogout');


    /*
     * Authentication middleware for both users and affiliates
     * Users and affiliates can access application until they login
     */
    Route::group(['middleware'=>['auth']],function(){


        /*
         * Intervention Images Request Handler
         * handle all the images request from user and affiliate
         * show images in html img tag
        */
        //get user avatar
        Route::get('avatars/{imageName}','ImagesController@getAvatar');


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

        //handle user post a task submit
        Route::post('post-task','TasksController@postTask');

        //show create profile page for user
        Route::get('profile/create', 'PagesController@showUserRegProfile');
        //create profile for new user
        Route::post('profile/create', 'UsersController@createProfile');
        //show profile page for user
        Route::get('user-profile', 'UsersController@showUserProfile');
        //show edit profile page for usere
        Route::get('profile/edit','UsersController@showEditProfile');
        //hanlde user edit profile request
        Route::post('profile/edit','UsersController@editProfile');

        //show date nearby page for user
        Route::get('date-near-by', 'TasksController@showDateNearby');
        //show date nearby page for user
//        Route::post('date-near-by', 'PagesController@showDateNearby');

        //handle user confirm booking request
        Route::post('confirm-date','TasksController@confirmDate');

        //show payment detail page for user
        Route::get('payment-details', 'PagesController@showPaymentDetail');
        //show payment detail page for user
        Route::post('payment-details', 'PagesController@showPaymentDetail');

        //show assigned date for user
        Route::get('assigned-date', 'TasksController@showAssignedDate');

        //show release payment list page for user
        Route::get('release-payment','PaymentController@showReleasePaymentList');
        //show specific release payment page for user
        Route::post('release-payment/{taskid}','PaymentController@showReleasePayment');

        //show review list page for user
        Route::get('reviews', 'PagesController@showUserReviewList');
        //show review page for user
        Route::post('reviews/{reviewid}', 'PagesController@showUserReview');

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

        //handle begin task request for affiliate
        Route::post('begin-task','UsersController@beginTask');

        //create profile for new affiliate
        Route::post('aprofile/create','UsersController@createAProfile');

        //show create bank detail page for affiliate
        Route::get('bank-detail/create', 'UsersController@showBankDetail');
        //handle bank detail create request for affiliate
        Route::post('bank-detail/create', 'UsersController@createBankDetail');
        //show edit bank detail page for affiliate
        Route::get('bank-detail/edit','UsersController@showBankDetailEdit');
        //handle bank detail edit request for affiliate
        Route::post('bank-detail/edit','UsersController@editBankDetail');

        //show profile(gallery) page for affiliate
        Route::get('aprofile', 'UsersController@showAProfile');
        //show edit profie page for affiliate
        Route::get('aprofile/edit', 'UsersController@showEditAProfile');
        //handle edit profile for affiliate
        Route::post('aprofile/edit', 'UsersController@editAProfile');

        //show task nearby page for affiliate
        Route::get('task-nearby','TasksController@showTaskNearby');

        //show make offer page for affiliate
        Route::post('make-offer', 'TasksController@showMakeOffer');
        //handle send offer action from affiliate
        Route::post('send-offer','TasksController@sendOffer');

        //show task list page for affiliate
        Route::get('task-list','TasksController@showTaskList');

        //show assigned task page for affiliate
        Route::get('assigned-task','TasksController@showAssignedTask');

        //show review page for affiliate
        Route::get('areviews','PagesController@showAReview');
        });

    });


    //Unit Test Pages
    Route::get('test-image','ImagesController@getProfileImage');


});



