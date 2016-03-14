<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sent_Offer extends Model
{
    protected  $table='sent_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_maker', 'price', 'date','place','status',
    ];

    /**
     * Get the posted task that owns the offer.
     */
    public function task()
    {
        //second parameter is foreign_key
        return $this->belongsTo('App\Models\Posted_Task','posted_task_id');
    }
}
