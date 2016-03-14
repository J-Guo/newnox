<?php

namespace App\Http\Controllers;

use App\Models\Sent_Offer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Posted_Task;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{

    /**
     * handle post a task action for user
     * user can post a task
     * @return View
     */
    public function postTask(Request $request){

        //get the prefered date
        $date = $request->input('date');
        //get the price of task
        $price = $request->input('price');
        //get the preference
        $preference = $request->input('preference');

        /*
         * do some validations here....
         */

        //create the task
        $posted_task = new Posted_Task();
        $posted_task->task_poster = Auth::user()->id;
        $posted_task->date = $date;
        $posted_task->price = $price;
        $posted_task->preference = $preference;
        $posted_task->status = "posted";

        //save posted task
        $posted_task->save();

        return redirect('date-near-by');

       // dd($request->input());
    }

    /**
     * show all the tasks which have been sent an offer for user
     * @return View
     */
    public function showDateNearby(){

        //get current user
        $user = Auth::user();
        //get posted and not assigned task by this user
        $posted_task = Posted_Task::where('task_poster',$user->id)
                                    ->where('status','posted')
                                    ->first();
        //set array for offer and corresponding sender (affiliate)
        $sentOfferArray = [];

        //if user has posted a task
        if(!empty($posted_task)){

        //get all offer  which are sent to this task
        $offers = $posted_task->offers;

        foreach($offers as $offer){

            //get the instance of affiliate who sent this offer
            $affiliate = User::find($offer->offer_maker);
            $offer_affiliate_merged = [
                'offer' => $offer,
                'sender'=> $affiliate
            ];
            $sentOfferArray[] = $offer_affiliate_merged;

        }

        }

              //  dd($offers);

        return view('date-near-by')->with('sentOfferArray',$sentOfferArray);
    }


    /**
     * handle confirm date action from user
     * @return View
     */
    public function confirmDate(Request $request){

        /*
         *some functions should be done here...
         *check whether user's payment method is stored
         */
        $check_result = true;

        //if user has a payment method and pay the fee
        if($check_result){

        //get current user
        $user = Auth::user();
        //get posted task by this user
        $posted_task = Posted_Task::where('task_poster',$user->id)->first();

        //get the offer id
        $offer_id = $request->input('offer_id');
        //get the offer instance
        $sent_offer = Sent_Offer::find($offer_id);

        //set current task is assigned and save it
        $posted_task->status = 'assigned';
        $sent_offer->status ='assigned';
        $posted_task->save();
        $sent_offer->save();

        return redirect('assigned-date');

        }
        else{
            return "Please fill your payment method";
        }

    }

    /**
     * show assigned date (chatroom) for user
     * @return View
     */
    public function showAssignedDate(){

        //get current user
        $user = Auth::user();
        //get assigned task by this user
        $posted_task = Posted_Task::where('task_poster',$user->id)
                                    ->where('status','assigned')
                                    ->first();

        //set array to store offer and affiliate information
        $assignedDateArray = [];

        if(!empty($posted_task)){

        //get the offer which is assigned to this task
        $sent_offer = $posted_task->offers->where('status','assigned')->first();

        //get the affiliate who made the offer
        $affiliate  = User::find($sent_offer->offer_maker);

        $assignedDateArray = [
            'affiliate'=>$affiliate,
            'offer'=>$sent_offer
        ];

        }

//        dd($affiliate);

        //begin chat with the affiliate
        return view('assigned-date')->with('assignedDateArray',$assignedDateArray);
    }


    /**
     * show task nearby page for affiliate
     * affiliate can see all posted and not-make-an-offer task nearby
     * @return View
     */
    public function showTaskNearby(){

        //get all the tasks near affiliate

        /*
         * some research queries should be done here..
         */
        $posted_tasks = Posted_Task::all();

        //set array to store poster and posted task information
        $postedTaskArray =[];

        /*
         *retrieve all tasks and find the poster
         *then merger task and the corresponding poster
         */
        foreach($posted_tasks as $task){

        $task_id = $task->id;

        //check affiliate has sent an offer to this task or not
        //if has sent, task will not be shown
        $check_result = $this->isOfferSentTo($task_id);

        //if affiliate has not sent an offer to this task
        if(!$check_result){
        //find the poster
        $poster = User::find($task->task_poster);

        $poster_task_mergerd = [
            "poster" => $poster,
            "task"   => $task
        ];

        //store poster task merged information into array
        $postedTaskArray[] = $poster_task_mergerd;

        }

        }

        //if no any task has been posted
        if(empty($postedTaskArray))
            return view('affiliate.task-nearby');
        else
            return view('affiliate.task-nearby')
                   ->with('postedTaskArray',$postedTaskArray);

//        dd($postedTaskArray);

    }

    /*
     *check affiliate has sent an offer to this task or not
     */
    private function isOfferSentTo($task_id){

     //get all offers sent by current affiliate
     $offers = Sent_Offer::where('offer_maker',Auth::user()->id)->get();

     if(empty($offers))
         return false;  //if affiliate has not sent any offer
     else{

        //check every task that affiliate has sent offer to
        foreach($offers as $offer){
           //if affiliate has sent an offer to this task
           if($offer->task->id == $task_id)
               return true;
             }
        return false;

     }

    }

    /**
     * show make offer page for affiliate
     * @return View
     */
    public function showMakeOffer(Request $request){

        //get task poster id
        $task_poster_id = $request->input('task_poster');
        //get task poster instance
        $task_poster = User::find($task_poster_id);

        //get task id
        $task_id = $request->input('task_id');
        //get task instance
        $posted_task = Posted_Task::find($task_id);


        /*
         * some functions should be done here...
         * check affiliate is new usr or not
         * new affliate should creat her bank detail
         */

       if(true){

           return view('affiliate.make-offer')
           ->with('task_poster',$task_poster)
           ->with('posted_task',$posted_task);
       }
        else{
            return redirect('bank-detail/create');
        }
    }

    /**
     * send offer from affiliate to user
     * @return View
     */
    public function sendOffer(Request $request){

        //get the id of affiiate who makes the offer
        $affiliate_id = Auth::user()->id;

        //get price
        $price = $request->input('price');
        //get offer date
        $date = $request->input('date');

        //get the id of user where offer is sent to
        $task_id = $request->input('task_id');

        //create a new offer instance
        $sent_offer = new Sent_Offer();
        $sent_offer->offer_maker = $affiliate_id;
        $sent_offer->posted_task_id = $task_id;
        $sent_offer->price = $price;
        $sent_offer->date = $date;
        $sent_offer->status = "sent";
        $sent_offer->save();

        return redirect('task-list');

    }

    /**
     * show task list of affiliate
     * @return View
     */
    public function showTaskList(){

       /*
        * find all offers sent by affiliate
        */
        $offers = Sent_Offer::where('offer_maker',Auth::user()->id)->get();

        //set the array for merged offer and poster
        $taskList = [];

        foreach ($offers as $offer) {

            //get the id of task where the offer is sent to
            $posted_task_id = $offer->task->id;

            //get the instance of posted task
            $posted_task = Posted_Task::find($posted_task_id);
            //get the instance of poster
            $poster = User::find($posted_task->task_poster);

            $offer_poster_merged = [
                "offer"  => $offer,
                "poster" => $poster
            ];

            //add offer and poster merged into array
            $taskList[] = $offer_poster_merged;

        }

//       dd($taskList);

        return view('affiliate.task-list')->with('taskList',$taskList);
    }

    /**
     * show assigned task page (chatroom) for affiliate
     * @return View
     */
    public function showAssignedTask(){

        //get current user
        $user = Auth::user();
        //get assigned offer by this affiliate
        $sent_offer = Sent_Offer::where('offer_maker',$user->id)
            ->where('status','assigned')
            ->first();

        //set array to store offer and affiliate information
        $assignedTaskArray = [];

        if(!empty($sent_offer)){

            //get the task instance where this offer is sent to
            $posted_task = $sent_offer->task;
            //get the affiliate who made the offer
            $user  = User::find($posted_task->task_poster);

            $assignedTaskArray = [
                'user'=> $user,
                'offer'=>$sent_offer
            ];

        }

//        dd($assignedTaskArray);
        return view('affiliate.assigned-task')
            ->with('assignedTaskArray', $assignedTaskArray);
    }
}
