<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TasksController extends Controller
{

    /**
     * user can post a task
     * @return View
     */
    public function postTask(Request $request){

        dd($request->input());
    }
}
