<?php

namespace App\Http\Controllers;

use App\Models\Sent_Offer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Posted_Task;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Services_Twilio;
use Services_Twilio_RestException;


class TasksController extends Controller
{

    /**
     * handle post a task action for user
     * user can post a task
     * @return View
     */
    public function postTask(Request $request){

        /*
         * do some validatins here..
         * user can post only one task at one period
         * user can post other task until current task has been finished or cancelled
         */

        //get the prefered date
        $date = $request->input('date');
        //get the price of task
        $rate = $request->input('rate');
        $duration = $request->input('duration');

        $price = $rate * $duration;
        //get the preference
        $preference = 'female';

        /*
         * do some validations here....
         */

        /*
         * check whether use has a current task or not
         */
        $tasks = Posted_Task::where('task_poster',Auth::user()->id)
                            ->whereNotIn('status',['reviewed','requested'])
                            ->get();

        //if user does not have a current task
        if($tasks->isEmpty()){
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
        }
        else
        return redirect('date-near-by')
            ->with('taskError','Please Finish Current Task Otherwise You Cannot Post A New Task');

//        dd(empty(0));
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

//                dd($sentOfferArray);

        return view('date-near-by')->with('sentOfferArray',$sentOfferArray);
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

        //get all posted  tasks near affiliate

        /*
         * some research queries should be done here..
         */
        $posted_tasks = Posted_Task::where('status','posted')->get();

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

        //validate the input
        $this->validate($request, [
            'price' => 'required|integer|max:255',
            'date' => 'required',
        ]);

        //get the id of affiiate who makes the offer
        $affiliate_id = Auth::user()->id;

        //get price
        $price = $request->input('price');
        //get offer date
        $date = $request->input('date');

        //get the id of user where offer is sent to
        $task_id = $request->input('task_id');

        //avoid re-submit offer
        $check_result = $this->isOfferSentTo($task_id);

        //if affiliate has not sent offer
        if(!$check_result){

        //create a new offer instance
        $sent_offer = new Sent_Offer();
        $sent_offer->offer_maker = $affiliate_id;
        $sent_offer->posted_task_id = $task_id;
        $sent_offer->price = $price;
        $sent_offer->date = $date;
        $sent_offer->status = "sent";
        $sent_offer->save();

        /**
         * when affiliate has made an offer to user
         * Send a SMS notification to user as well
         */

        //set Twilio AccountSid and AuthToken
        $AccountSid = config('services.twilio.sid');
        $AuthToken =  config('services.twilio.token');
        $from = config('services.twilio.from_number');

        //get posted task
        $task = Posted_Task::find($task_id);

        /*
         * Use them when project goes alive
         */
        //get task poster mobile number
        $mobileNum = $task->poster->mobile;

        //set message body (OTP)
        $smsBody = "You got a new offer! Please check it";

        //create message client
        $client = new Services_Twilio($AccountSid, $AuthToken);

        //check user mobile phone number is correct or not
        //create message and send it
        try{
            //use it when project goes alive
//            $message = $client->account->messages->sendMessage(
//                $from,
//                $mobileNum,
//                $smsBody
//            );

            return redirect('task-list');
        }
        catch(Services_Twilio_RestException $e){
//            return redirect('task-list');
            echo $e;
        }

        }
        //tell affiliate offer has already been sent
        else
            return redirect('task-nearby')->with('message','Offer has already sent');

    }

    /**
     * show task list of affiliate
     * @return View
     */
    public function showTaskList(){

       /*
        * find all sent and assigned offers by affiliate
        */
        $offers = Sent_Offer::where('offer_maker',Auth::user()->id)
                            ->whereIn('status',['sent'])
                            ->orderBy('created_at','desc')
                            ->get();

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

    public function showAssignedTaskList(){

        /*
         * find all sent and assigned offers by affiliate
         */
        $offers = Sent_Offer::where('offer_maker',Auth::user()->id)
            ->whereIn('status',['assigned'])
            ->get();

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

        return view('affiliate.assigned-task-list')->with('taskList',$taskList);

    }

    /**
     * show assigned task page (chatroom) for affiliate
     * @return View
     */
    public function showAssignedTask($offer_id){


        //get assigned offer by this affiliate
        $sent_offer = Sent_Offer::find($offer_id);

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
