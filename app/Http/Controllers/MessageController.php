<?php
/**
 * handle pusher message
 */

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher;
use App\Http\Requests;

class MessageController extends Controller
{

    protected $pusher;

    public function __construct()
    {

        $options = array(
            'encrypted' => true
        );
        $this->pusher = new Pusher(
            config('services.pusher.key'),
            config('services.pusher.secret'),
            config('services.pusher.app'),
            $options
        );
    }


    public function postMessage(Request $request)
    {

        //get chat message
        $text = $request->input('text');
        //get chat room number
        $roomNum = $request->input('roomNum');
        //get pusher sender id
        $sender = $request->input('sender');

        $message = [
            'text' => $text,
            'timestamp' => (time()*1000),
            'sender' => $sender,
        ];

        //save chat history
        $chat_message = new ChatMessage();
        $chat_message->chat_thread = $roomNum;
        $chat_message->sender = Auth::user()->id;
        $chat_message->message = $text;
        $chat_message->save();

        $this->pusher->trigger($roomNum, 'new-message', $message);
    }
}
