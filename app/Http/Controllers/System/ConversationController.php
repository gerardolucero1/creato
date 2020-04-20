<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conversation;
use App\Profile;


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
        $conversations = Conversation::where('user_id', auth()->id())
        ->get();

        //dd($conversations);
        return $conversations;
    }
}
