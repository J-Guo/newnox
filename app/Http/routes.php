<?php

Route::group(['middleware'=>'web'],function(){

    //temporary signin page for internal user
    Route::get('signin','TestController@showSignin');
    //handle signin action for user
    Route::post('signin','TestController@handleSignin');

    /*
     * temporary internal middleware, only internal user can access project
     * Should be deleted when project goes alive
     */
    Route::group(['middleware'=>'internal'],function(){



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

        //store user current location through Ajax
        Route::post('store-location','PagesController@storeLocation');

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

        //show create profile page for user
        Route::get('profile/create', 'PagesController@showUserRegProfile');
        //create profile for new user
        Route::post('profile/create', 'UsersController@createProfile');

        /**
         * new user middleware, user can go view all pages
         * if he has created his profile
         */
        Route::group(['middleware'=>'newuser'],function(){

        //show main pages for user
        Route::get('main','PagesController@showMainPage');
        Route::get('main-listview','PagesController@showMainListviewPage');
        //get all affiliate locations based on user research
        Route::post('affiliate-locations','PagesController@getNearbyAffiliates');

        //handle user post a task submit
        Route::post('post-task','TasksController@postTask');

        //show profile page for user
        Route::get('user-profile', 'UsersController@showUserProfile');
        //show edit profile page for usere
        Route::get('profile/edit','UsersController@showEditProfile');
        //hanlde user edit profile request
        Route::post('profile/edit','UsersController@editProfile');

        //show date nearby page for user
        Route::get('date-near-by', 'TasksController@showDateNearby');

        //handle user confirm booking request
        Route::post('confirm-date','PaymentController@confirmDate')
             ->middleware('paymentcheck');
        //show braintree checkout form
        Route::get('payment','PaymentController@showBraintreeCheckout');
        Route::post('payment','PaymentController@handleBraintreeCheckout');

        //show payment method modification page for user
        Route::get('payment-details', 'PaymentController@showPaymentDetail');
        //handle payment method modification for user
        Route::post('payment-details', 'PaymentController@editPaymentDetail');

        //show assigned date for user
        Route::get('assigned-date', 'TasksController@showAssignedDate');

        //show release payment list page for user
//        Route::get('release-payment','PaymentController@showReleasePaymentList');
        //show specific release payment page for user
//        Route::post('release-payment/{offerid}','PaymentController@showReleasePayment');
        //handle release payment function for user
//        Route::post('release-payment','PaymentController@handleReleasePayment');

        //show review list page for user
        Route::get('reviews', 'PagesController@showUserReviewList');
        //handle make review action for user
        Route::post('reviews', 'PagesController@makeReivew');
        //show review page for user
        Route::post('reviews/{taskid}', 'PagesController@showUserReview');


        }); //end newuser middleware

        });//end entrust role:user middleware


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
        Route::get('aprofile/create','UsersController@showACreateProfile');
        Route::post('aprofile/create','UsersController@createAProfile');

        /**
         * new affiliate check middleware, affiliate can gou to all pages,
         * if she has created her profile
         */
        Route::group(['middleware'=>'newaffiliate'],function(){



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
        Route::get('make-offer', 'TasksController@showMakeOffer');
        //handle send offer action from affiliate
        Route::post('send-offer','TasksController@sendOffer');

        //show task list page for affiliate
        Route::get('task-list','TasksController@showTaskList');
        //show all assigned task list for affiliate
        Route::get('assigned-task-list','TasksController@showAssignedTaskList');

        //show assigned task page for affiliate
        Route::get('assigned-task/{offerid}','TasksController@showAssignedTask');

        //show request payment list page for affiliate
        Route::get('request-payment','PaymentController@showRequestPaymentList');
        //show specific request payment page for affiliate
        Route::post('request-payment/{offerid}','PaymentController@showRequestPayment');
        //handle request payment action from affiliate
        Route::post('request-payment','PaymentController@handleRequestPayment');

        //show reviews list page for affiliate
        Route::get('areviews','PagesController@showAReviewList');
        //handle make review action for affiliate
        Route::post('areviews','PagesController@makeAffiliateReview');
        //show review page for affiliate
        Route::post('areviews/{offerid}', 'PagesController@showAReview');

        });//end middleware newaffiliate

        });//end middleware role:affiliate


    });


    //Unit Test Pages
    Route::get('test-image','ImagesController@getProfileImage');
    //Unit test
    Route::get('test-review','TestController@testUserReview');
    //Test OTP
    Route::get('test-otp','TestController@testOTP');
    //
    Route::get('test-distance','TestController@testDistance');


    });// end internal middleware

});



