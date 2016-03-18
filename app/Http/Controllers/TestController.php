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
}
