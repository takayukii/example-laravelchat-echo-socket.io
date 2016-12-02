<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class ApiMessagesController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function createMessage(User $receiver, Request $request)
    {
	    $params = $request->all();
	    $me = \Auth::user();

		$message = Message::create($params);
	    $message->sender()->associate($me);
	    $message->receiver()->associate($receiver);
	    $message->save();

	    return $message->toJson();
    }

    public function listMessages(User $user)
    {
	    $me = \Auth::user();

	    return Message::related($me, $user)->with([
	    	'sender',
		    'receiver',
	    ])->orderBy('created_at', 'desc')->get();
    }
}
