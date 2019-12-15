<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $contactId = $request->contact_id;
        return Message::select(
            'id', 
            DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as writtenByMe"),
            'created_at', 
            'content'
            )->where(function ($querty) use ($userId, $contactId){
                $querty->where('from_id', $userId)->where('to_id', $contactId);
            })->orWhere(function ($querty) use ($userId, $contactId){
                $querty->where('from_id', $contactId)->where('to_id', $userId);
            })->get();
    }
    public function store(Request $request)
    {
        $message = new Message();
        $message->from_id = auth()->id();
        $message->to_id = $request->to_id;
        $message->content = $request->content;
        $saved = $message->save();

        $data = [];
        $data['success'] = $saved;
        $data['message'] = $message;
        return $data;
    }
}
