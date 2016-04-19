/**
 * Created by Eric on 19/04/2016.
 * Pusher Chat Scripts
 */

/**
 * Initialize Pusher
 * @type {Pusher}
 */
//get pusher key
var pusher_key = $('meta[name="pusher-key"]').attr('content');
//initialize pusher
var pusher = new Pusher(pusher_key);
//get channel name
var roomNum = $('#roomNum').val();
//get post message url
var postURL = $('meta[name="post-url"]').attr('content');
//descript channel
var channel = pusher.subscribe(roomNum);
//bind event, when new message comes in, show that message
channel.bind('new-message', addMessage);


// Ensure CSRF token is sent with AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="chat-csrf-token"]').attr('content')
    }
});

// Added Pusher logging
Pusher.log = function(msg) {
    console.log(msg);
};


$('#chatForm').submit(function(){

    //get message from input field
    var msg = $('#m').val();

    // Build POST data and make AJAX request
    var data = {
        text: msg,
        roomNum:roomNum,
        sender:pusher.connection.socket_id
    };

    //sent to socket server
    $.post(postURL, data).success(sendMessageSuccess).error(sendMessageFailed);

    //reset input filed
    $('#m').val('');

    //prevent submit
    return false;
});



// Handle the success callback
function sendMessageSuccess() {
    console.log('message sent successfully');
}

//handle the failed callback
function sendMessageFailed(){
    alert('The session has expired, please refresh the page');
}

// Build the UI for a new message and add to the DOM
function addMessage(data) {

    var chat_message = data.text;
    var sender = data.sender;

    var appendMsg ="";

    //if user is the sender
    if(sender == pusher.connection.socket_id){

        appendMsg = '<div class="message message-sent message-with-tail">'
            +'<div class="message-text">'
            +chat_message
            +'</div>'
            +'</div>';
    }
    else
        appendMsg = '<div class="message message-received message-with-tail">'
            +'<div class="message-text">'
            +chat_message
            +'</div>'
            +'</div>';

    $('#chatRoom').append(appendMsg);

}







