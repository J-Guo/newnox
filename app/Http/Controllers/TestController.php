<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

    /**
     * Test Revies functions for user
     * @return string
     */
    public function testUserReview(){


        $user = User::find(4);

        return $user->avgRateAsAffiliate();
    }

    /*
     *temporary signin page for internal user
     */
    public function showSignin(){
        return view('auth.signin');
    }


    /**
     * handle signin action for internal user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleSignin(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        if($username == config('services.internal.username') &&
            $password == config('services.internal.password')){

            //set session for internal user and redirect
            session()->put('internal', 'internal');
            return redirect('login');

        }
        else
            return redirect('signin');

    }
}
