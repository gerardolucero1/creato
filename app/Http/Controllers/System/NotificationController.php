<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationController extends Controller
{
    public function show($id)
    {
        $notifications = Notification::where('notifiable_id', $id)->where('read_at', null)->get();
        return $notifications;
    }
}
