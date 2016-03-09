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
}
