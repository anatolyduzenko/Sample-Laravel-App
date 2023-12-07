<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Flash;

class RabbitMQTestController extends Controller
{
    /**
     * Display a testing form 
     */
    public function index(Request $request)
    {
        return view('rabbitmq.index');
    }

    /**
     * Add new message to queue
     */
    public function send_message(Request $request)
    {
        $channel_name = $request->input('channel');
        $message_text = $request->input('message');
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare($channel_name, false, false, false, false);
        $msg = new AMQPMessage($message_text);
        $channel->basic_publish($msg, '', $channel_name);
        $channel->close();
        $connection->close();
        Flash::success('Message sent');
        return redirect(route('rabbitmq.index'));
    }
}
