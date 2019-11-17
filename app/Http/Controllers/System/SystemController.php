<?php

namespace App\Http\Controllers\System;

use Carbon\Carbon;
use Calendar;
use App\Event;
use App\Project;
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

    public function obtenerDatos(){
        $date = Carbon::now();
        $fechaHoy = $date->format('Y');
        $fechaPasada = $date->subYear()->format('Y');

        $proyectosHoy = Project::whereYear('date', $fechaHoy)->get();
        $proyectosPasados = Project::whereYear('date', $fechaPasada)->get();

        $data = [$proyectosHoy, $proyectosPasados];
        return $data;
    }
}
