<?php

use App\Guest;
use App\Project;
use App\Companion;
use App\GuestList;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Web routes
Route::get('/', 'web\IndexController@index');

Auth::routes();

// System routes

Route::group(['middleware' => ['auth']], function () {
    
    Route::match(['get', 'post'], '/dashboard', 'System\SystemController@index')->name('dashboard.admin');

    // Portfolio routes
    Route::get('dashboard/portafolio', 'System\PortfolioController@index')->name('portfolio.index');
    Route::get('dashboard/portafolio/create', 'System\PortfolioController@create')->name('portfolio.create');
    Route::get('dashboard/portafolio/show/{id}', 'System\PortfolioController@show')->name('portfolio.show');
    Route::post('dashboard/portafolio', 'System\PortfolioController@store')->name('portfolio.store');
    Route::get('dashboard/portafolio/edit/{id}', 'System\PortfolioController@edit')->name('portfolio.edit');
    Route::put('dashboard/portafolio/{id}', 'System\PortfolioController@update')->name('portfolio.update');
    Route::delete('dashboard/portafolio/{id}', 'System\PortfolioController@destroy')->name('portfolio.delete');
        // Portfolio pictures
        Route::post('dashboard/portafolio/{id}/imagenes', 'System\PortfolioController@upload')->name('portfolio.images');
        Route::delete('dashboard/portafolio/image/{id}', 'System\PortfolioController@destroyImage')->name('portfolio.delete.image');

    // Users routes
    Route::get('dashboard/usuarios', 'System\UsersController@index')->name('users.index');
    Route::get('dashboard/usuarios/create', 'System\UsersController@create')->name('users.create');
    Route::get('dashboard/usuarios/edit/{id}', 'System\UsersController@edit')->name('users.edit');
    Route::post('dashboard/usuarios', 'System\UsersController@store')->name('users.store');
    Route::put('dashboard/usuarios/{id}', 'System\UsersController@update')->name('users.update');
    Route::delete('dashboard/usuarios/{id}', 'System\UsersController@destroy')->name('users.delete');

    // Projects routes
    Route::get('dashboard/proyectos', 'System\ProjectController@index')->name('projects.index');
    Route::get('dashboard/proyectos/create', 'System\ProjectController@create')->name('projects.create');
    Route::get('dashboard/proyectos/show/{id}', 'System\ProjectController@show')->name('projects.show');
    Route::post('dashboard/proyectos', 'System\ProjectController@store')->name('projects.store');
    Route::get('dashboard/proyectos/edit/{id}', 'System\ProjectController@edit')->name('projects.edit');
    Route::put('dashboard/proyectos/{id}', 'System\ProjectController@update')->name('projects.update');
    Route::put('dashboard/planos/{id}', 'System\ProjectController@updatePlans')->name('projects.plans');

        // Get cliente project
        Route::get('proyecto/cliente/{id}', function($id){
            $project = Project::find($id);

            return $project->user;
        });

        // Get companions list
        Route::get('lista/acompanantes/{id}', function($id){
            $list = GuestList::find($id);
            $guests = Guest::where('guestList_id', $list->id)->with('companions')->get();

            return $guests;
        });
    // My List routes
    Route::resource('mi-lista', 'System\MyListController');
    Route::put('actualizar-listas', 'System\MyListController@updateAll');

    // Client dashboard 
    Route::get('cliente/', 'System\ClientController@index')->name('dashboard.client');

        // Guests
        Route::get('cliente/invitados', 'System\GuestController@index')->name('guests.index'); 
        // Update guest status
        Route::put('actualizar-estatus-invitado/{id}', function(Request $request, $id){
            $guest = Guest::find($id);
            $guest->status = $request->status;
            if($request != 'CONFIRMADO'){
                $guest->dataX = null;
                $guest->dataY = null;
                $guest->seated = false;
            }
            $guest->save();
            return;
        });
        // Update companion status
        Route::put('actualizar-estatus-acompanante/{id}', function(Request $request, $id){
            $companion = Companion::find($id);
            $companion->status = $request->status;
            if($request != 'CONFIRMADO'){
                $companion->dataX = null;
                $companion->dataY = null;
                $companion->seated = false;
            }
            $companion->save();
            return;
        });

    // Tables routes
    Route::get('cliente/tables', 'System\TablesController@index')->name('tables.index');
    Route::get('cliente/tables/invitados', 'System\TablesController@invitados')->name('tables.invitados');
    Route::put('cliente/tables/{id}', 'System\TablesController@update')->name('tables.update');
    Route::put('cliente/tables/limpiar/{id}', 'System\TablesController@destroy')->name('tables.delete');
    Route::get('cliente/tables/proyecto', 'System\TablesController@project')->name('tables.project');

});




