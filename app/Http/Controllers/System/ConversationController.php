<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conversation;
use App\Profile;
use App\Config;


class ConversationController extends Controller
{
    public function index()
    {
        $config = Config::find(1);
        return view('system.messages.chat', compact('config')); 
    }

    public function indexClient()
    {
        $config = Config::find(1);
        return view('system.client.messages.index', compact('config')); 
    }

    public function conversation()
    {
        $conversations = Conversation::where('user_id', auth()->id())
        ->get();

        //dd($conversations);
        return $conversations;
    }
}
