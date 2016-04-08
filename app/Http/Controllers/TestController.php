<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Sent_Offer;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    /**
     * Test Revies functions for user
     * @return string
     */
    public function testUserReview(){


        $offers = Sent_Offer::where('posted_task_id',1)
            ->whereNotIn('status',['assigned']) //not assigned offer
            ->whereNotIn('id',[2])
            ->get();

//        dd($offers);

        for($i= 0;$i<$offers->count();$i++){

            echo $offers[$i];
        }

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

    public function testOTP(){

        $user = User::find(1);

        $otp = Crypt::decrypt($user->otp);

        dd($otp);

    }

    public function testDistance(){

        $lat = Auth::user()->latitude;
        $lng = Auth::user()->longitude;

        $affiliates =
            DB::table('users')
                //select distance radius
                ->select(DB::raw("*, (6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lng) ) + sin( radians($lat ) ) * sin( radians( latitude ) ) ) ) AS distance"))
                //select all users who have affiliate role
                ->whereIn('id',function($query){
                    $query->select('user_id')
                        ->from('role_user')
                        ->whereIn('role_id',function($q){
                            $q->select('id')
                                ->from('roles')
                                ->where('name','affiliate');
                        });
                })
                ->having('distance', '<', config('services.google_map.radius')) //radius distance (km)
                ->orderBy('distance')
                ->limit(config('services.google_map.limit')) //the the number of research results
                ->get();


        dd($affiliates);

    }
}
