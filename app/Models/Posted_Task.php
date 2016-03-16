<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posted_Task extends Model
{
    protected  $table='posted_tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_poster', 'price', 'date','place','status','preference',
    ];

    /**
     * A Posted taks can have many offers from affiliate
     */
    public function offers(){
        //second parameter is foreign_key
        return $this->hasMany('App\Models\Sent_Offer','posted_task_id');
    }

    /**
     * Get the user who posted this task
     */
    public function poster(){
        //second parameter is foreign_key
        return $this->belongsTo('App\User','task_poster');
    }
}
