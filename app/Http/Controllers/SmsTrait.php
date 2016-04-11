<?php
/**
 * SMS Sender Trait
 */

namespace App\Http\Controllers;

use Services_Twilio;
use Services_Twilio_RestException;

trait SmsTrait{

    /**
     * Send SMS Function
     * @param $mobile
     * @param $body
     */
    protected function sendSMS($mobile,$body){

        //set Twilio AccountSid and AuthToken
        $AccountSid = config('services.twilio.sid');
        $AuthToken =  config('services.twilio.token');
        $from = config('services.twilio.from_number');

        //create message client
        $client = new Services_Twilio($AccountSid, $AuthToken);

        //send SMS
        $client->account->messages->sendMessage(
            $from,
            $mobile,
            $body
        );

    }

}