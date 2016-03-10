<?php

namespace App\Http\Controllers;

use App\Models\Sent_Offer;
use App\Models\Task_Offer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Posted_Task;
use Illuminate\Support\Facades\Auth;
use App\User;

class TasksController extends Controller
{

    /**
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


        if($posted_tasks->isEmpty())
            return view('affiliate.task-nearby');
        else
            return view('affiliate.task-nearby')
                   ->with('posted_tasks',$posted_tasks);

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


//    dd($posted_task);

        return view('affiliate.make-offer')
            ->with('task_poster',$task_poster)
            ->with('posted_task',$posted_task);
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

        //create a new offer instance
        $sent_offer = new Sent_Offer();
        $sent_offer->offer_maker = $affiliate_id;
        $sent_offer->price = $price;
        $sent_offer->date = $date;
        $sent_offer->status = "sent";
        $sent_offer->save();

        //get the id of user where offer is sent to
        $task_id = $request->input('task_id');
        //create a new task_offer instance
        $task_offer = new Task_Offer();
        $task_offer->task_id = $task_id;
        $task_offer->offer_id = $sent_offer->id;
        $task_offer->save();

//        dd($request->input());

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
            $posted_task_id = Task_Offer::where('offer_id',$offer->id)->first()->task_id;

            //get the instance of posted task
            $posted_task = Posted_Task::find($posted_task_id);
            //get the instance of poster
            $poster = User::find($posted_task->task_poster);

            $offer_poster_merged = [
                "offer"  => $offer,
                "poster" => $poster
            ];

            $taskList = [$offer_poster_merged];

        }

//       dd($taskList[0]["poster"]);

        return view('affiliate.task-list')->with('taskList',$taskList);
    }
}
