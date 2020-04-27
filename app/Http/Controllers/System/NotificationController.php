<?php

namespace App\Http\Controllers\System;

use App\User;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function show($id)
    {
        $notifications = Notification::where('notifiable_id', $id)->where('read_at', null)->get();
        return $notifications;
    }
    public function details($id)
    {
        $user = User::where('id', $id)->get();
        return $user;
    }

    public function markRead(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));
        $notifications = Notification::where('data', $data->data)->get();
        // dd($notifications);
        // dd(Auth::user()->unreadNotifications->where('data', $data->data));
        foreach ($notifications as $notification) {
            $notification->read_at = Carbon::now();
            $notification->save();
        }

        return 1;
    }
}
