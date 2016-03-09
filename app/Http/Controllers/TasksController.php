<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Posted_Task;
use Illuminate\Support\Facades\Auth;

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
     * affiliate can see all posted task nearby
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
}
