<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\User;

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
    public function date($id)
    {
        $notifications = Notification::where('data', $id)->where('read_at', null)->get();
        return $notifications;
    }
}
