/**
 * Created by Junjie on 24/03/2016.
 * Chatroom sever built with socket.io
 */

//create sever
var server = require('http').Server();
var io = require('socket.io')(server);


io.on('connection', function(socket){

    socket.on('subscribe', function(room) {
        console.log('New client connected (id=' + socket.id + ').','joining room', room);
        socket.join(room);
    });

    socket.on('unsubscribe', function(room) {
        console.log('leaving room', room);
        socket.leave(room);
    });

    socket.on('send', function(data) {
        console.log(data.message);
        io.sockets.in(data.room).emit('message', data.message,socket.id);
    });
});

//listen on port 3000
server.listen(3000, function(){
    console.log('listening on *:3000');
});
