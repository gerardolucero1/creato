<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de la lista de invitados
//Route::get('lista/{listum}', 'System\GuestController@show');


// Task Routes
Route::resource('tarea', 'System\TaskController');

Route::apiResource('/calendar', 'System\CalendarController');


