<?php

namespace App\Http\Controllers;

use App\models\Affiliate_Review;
use App\Models\Posted_Task;
use App\Models\Sent_Offer;
use App\models\User_Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\User;

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

    //show index page based on user type
    public function showIndexPage(){

        $user = Auth::user();

        if($user->hasRole('user'))
            return redirect('main');
        elseif($user->hasRole('affiliate'))
            return redirect('task-nearby');

    }

    //show main pages for user
    public function showMainPage(){
        return view('main');
    }

    //show list view of main pages for user
    public function showMainListviewPage(){
        return view('main-listview');
    }

    /**
     * store user current location
     * @param Request $request
     */
    public function storeLocation(Request $request){

        //get coordinates of user location
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        //store user current location
        $user = Auth::user();
        $user->latitude = $latitude;
        $user->longitude = $longitude;
        $user->save();

    }

    /**
     * Find the affiliate locations based on user current location
     * and radians distance (km)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNearbyAffiliates(Request $request){

        $lat = $request->input('latitude');
        $lng = $request->input('longitude');

        $locations =
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

        return response()->json($locations);

    }

    //show FAQ page for affiliate
    public function showFAQ(){
        return view('affiliate.faq');
    }


    /**
     * show reviews list for user
     * @return View
     */
    public function showUserReviewList(){

        //get all released ,not reviewed offers which are sent to current users
//        $offers = Sent_Offer::whereIn('status',['released','reviewed'])
//            ->whereHas('task',function($query){
//                $query->where('task_poster',Auth::user()->id);
//            })->get();

        $tasks = Posted_Task::where('task_poster',Auth::user()->id)
                            ->whereIn('status',['requested','reviewed'])
                            ->orderBy('status')  //sort by status, not reviewed task comes fisrt
                            ->orderBy('updated_at','desc') //order by updated date
                            ->get();

//        dd($tasks);

        return view('reviews')->with('tasks',$tasks);
    }

    /**
     * show review page for user
     * @param offerid
     * @return View
     */
    public function showUserReview($taskid){

        //get the instance of task which is waiting for review
        $task = Posted_Task::find($taskid);
        //get the instance of offer which is completed with this task
        $offer = $task->offers()->whereIn('status',['requested','reviewed'])->first();

        return view('review')->with('task',$task)->with('offer',$offer);
    }

    /**
     * handle make review action for user
     * @return Redirector
     */
    public function makeReivew(Request $request){

        //get rating from user
        $rating = $request->input('rating');
        //get offerid
        $offerid = $request->input('offerid');
        //get offer instance
        $offer = Sent_Offer::find($offerid);

        //create new user review instance
        $user_review = new User_Review();
        $user_review->reviewer = Auth::user()->id;
        $user_review->reviewee = $offer->sender->id;
        $user_review->posted_task_id = $offer->task->id;
        $offer->task->status = "reviewed"; //set task as reviewed
        $user_review->rate = $rating;
        //save changes
        $user_review->save();
        $offer->task->save();

       // dd($request->input());

        return redirect('reviews')->with('message','Review has been made');
    }


    /**
     * show review page for affiliate
     * @return View
     */
    public function showAReviewList(){

        //get all requested ,not reviewed offers which are sent by current affiliate
        $offers = Sent_Offer::where('offer_maker',Auth::user()->id)
                            ->whereIn('status',['requested','reviewed'])
                            ->orderBy('status')
                            ->orderBy('updated_at','desc')
                            ->get();

//        dd($offers);

        return view('affiliate.reviews')->with('offers',$offers);
    }

    /**
     * show review page for affiliate
     * @param offerid
     * @return View
     */
    public function showAReview($offerid){

        //get the instance of task which is waiting for review
        $offer = Sent_Offer::find($offerid);

        return view('affiliate.review')->with('offer',$offer);
    }

    /**
     * handle make review action for affiliate
     * @param Request $request
     * @return Redirector
     */
    public function makeAffiliateReview(Request $request){

        //get rating from affiliate
        $rating = $request->input('rating');
        //get offerid
        $offerid = $request->input('offerid');
        //get offer instance
        $offer = Sent_Offer::find($offerid);

        $affiliate_review = new Affiliate_Review();
        $affiliate_review->reviewer = Auth::user()->id;
        $affiliate_review->reviewee = $offer->task->poster->id;
        $affiliate_review->sent_offer_id = $offer->id;
        $offer->status = "reviewed"; //set this offer as reviewed
        $affiliate_review->rate = $rating;

        $offer->save();
        $affiliate_review->save();

//        dd($request->input());

        return redirect('areviews')->with('message','Review has been made');
    }



}
