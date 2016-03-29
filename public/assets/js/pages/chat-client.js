/**
 * Created by Junjie on 24/03/2016.
 * Javascript for chat client side
 */

//var socket = io('http://localhost:3000'); //local environment
var socket = io('http://10.0.0.132:3000'); //product environment

var roomNum = $('#roomNum').val();

//subcribe a room
socket.emit('subscribe', roomNum );


$('#chatForm').submit(function(){

    //get message from input field
    var msg = $('#m').val();

    //sent to socket server
    socket.emit('send', { room: roomNum , message: msg });

    //reset input filed
    $('#m').val('');

    //prevent submit
    return false;
});


socket.on('message', function (data,id) {

    //console.log(id+" "+socket.io.engine.id+" "+data);

    var appendMsg ="";

    //if user is the sender
    if(id == '/#'+socket.id){

    appendMsg = '<div class="message message-sent message-with-tail">'
        +'<div class="message-text">'
        +data
        +'</div>'
        +'</div>';
    }
    else
        appendMsg = '<div class="message message-received message-with-tail">'
            +'<div class="message-text">'
            +data
            +'</div>'
            +'</div>';

    $('#chatRoom').append(appendMsg);
});
