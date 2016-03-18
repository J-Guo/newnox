<?php

namespace App\Http\Controllers;

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


        $user = Auth::user();

        return $user->avgRateAsUser();
    }
}
