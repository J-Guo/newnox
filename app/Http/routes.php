<?php

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

Route::get('login', function () {
    return view('login-user');
});

Route::get('main', function () {
    return view('main');
});

Route::post('otp', function () {
    return view('otp');
});

Route::get('otp', function () {
    return view('otp');
});

Route::post('reg-profile', function () {
    return view('reg-profile');
});

Route::get('reg-profile', function () {
    return view('reg-profile');
});

Route::get('post-a-task', function () {
    return view('post-a-task');
});

Route::post('post-a-task', function () {
    return view('post-a-task');
});

Route::get('date-near-by', function () {
    return view('date-near-by');
});

Route::post('date-near-by', function () {
    return view('date-near-by');
});

Route::get('payment-details', function () {
    return view('payment-details');
});

Route::post('payment-details', function () {
    return view('payment-details');
});

Route::get('asigned-task', function () {
    return view('asigned-task');
});

Route::post('asigned-task', function () {
    return view('asigned-task');
});

Route::post('user-profile', function () {
    return view('user-profile');
});

Route::get('user-profile', function () {
    return view('user-profile');
});

Route::post('reviews', function () {
    return view('reviews');
});

Route::get('reviews', function () {
    return view('reviews');
});


/*
|--------------------------------------------------------------------------
| Affiliate Routes File
|--------------------------------------------------------------------------
|
*/
Route::get('faq', function () {
    return view('affiliate.faq');
});

Route::get('apersonal-detail', function(){
    return view('affiliate.personal-detail');
});

Route::get('aprofile', function(){
    return view('affiliate.profile');
});

Route::get('make-offer', function(){
    return view('affiliate.make-offer');
});

Route::get('task-nearby',function(){
    return view('affiliate.task-nearby');
});

Route::get('task-list',function(){
    return view('affiliate.task-list');
});

Route::get('assigned-task',function(){
    return view('affiliate.assigned-task');
});