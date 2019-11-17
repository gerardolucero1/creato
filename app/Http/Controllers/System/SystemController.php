<?php

namespace App\Http\Controllers\System;

use Calendar;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SystemController extends Controller
{

    public function index(){
        $user = Auth::user();
        $rol = $user->roles->implode('name', ',');

        switch ($rol) {
            case 'super-admin':
                return view('system.dashboard');
                break;
            case 'cliente':
                return view('system.client.dashboard');
                break;
            
            default:
                return back();
                break;
        }

    }

    public function estadisticasIndex(){
        return view('system.statistics.index');
    }
}
