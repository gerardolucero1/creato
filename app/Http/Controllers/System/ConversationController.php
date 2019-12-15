<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conversation;


class ConversationController extends Controller
{
    public function index()
    {
        return view('system.messages.chat');
    }

    public function indexClient()
    {
        return view('system.client.messages.index');
    }

    public function conversation()
    {
        return Conversation::where('user_id', auth()->id())
        ->get([
            'id',
            'contact_id',
            'has_blocked',
            'listen_notifications',
            'last_message',
            'last_time'
        ]);
    }
}
