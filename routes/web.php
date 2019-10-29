<?php

use App\Project;

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
        // Get cliente project
        Route::get('proyecto/cliente/{id}', function($id){
            $project = Project::find($id);

            return $project->user;
        });

    // Client dashboard 
    Route::get('cliente/', 'System\ClientController@index')->name('dashboard.client');

        // Guests
        Route::get('cliente/invitados', 'System\GuestController@index')->name('guests.index'); 


    // Quotation Routes
    Route::get('dashboard/cotizacion', 'System\QuotationController@index')->name('quotation.index');
    Route::post('Quotation', 'System\QuotationController@store')->name('quotation.store');
    Route::delete('dashboard/cotizacion/{id}', 'System\QuotationController@destroy')->name('quotation.delete');
    Route::get('quotation/{id}', 'System\QuotationController@show')->name('quotation.show');
    Route::get('dashboard/cotizaciones', 'System\QuotationController@getQuotation')->name('quotation.getQuotation');

    // ProfileRoutes
    Route::get('dashboard/perfil', 'System\ProfileController@index')->name('users.Profile');
    Route::get('dashboard/perfil/create', 'System\ProfileController@create')->name('profile.create');
    Route::post('dashboard/perfil', 'System\ProfileController@store')->name('profile.store');
    Route::get('dashboard/perfil/{id}', 'System\ProfileController@edit')->name('profile.edit');
    Route::put('dashboard/perfil/{id}', 'System\ProfileController@update')->name('profile.update');

    // Task Routes
        // Block
    Route::get('dashboard/block', 'System\BlocktaskController@index')->name('block.index');
    Route::get('dashboard/blocks/get', 'System\BlocktaskController@getBlock')->name('block.getBlock');
    Route::get('dashboard/users/get', 'System\BlocktaskController@getUsers')->name('block.getUsers');
    Route::post('dashboard/block/save', 'System\BlocktaskController@store')->name('block.store');
    Route::put('dashboard/block/update/{id}', 'System\BlocktaskController@update')->name('block.update');
    Route::delete('dashboard/block/delete/{id}', 'System\BlocktaskController@destroy')->name('block.destroy');

        // List
    Route::get('dashboard/lista', 'System\ListtaskController@index')->name('list.index');
    Route::get('dashboard/list/get/{id}', 'System\ListtaskController@getLists')->name('list.getLists');
    Route::put('dashboard/list/update/{id}', 'System\ListTaskController@update')->name('list.update');
    Route::post('dashboard/lista/store', 'System\ListtaskController@store')->name('list.store');
    Route::get('dashboard/lista/{id}', 'System\ListtaskController@show')->name('list.show');
    Route::delete('dashboard/lista/delete/{id}', 'System\ListtaskController@destroy')->name('list.destroy');
    

        // Task
    Route::get('dashboard/tarea', 'System\TaskController@index')->name('task.index');
    Route::post('dashboard/lista/tarea/store', 'System\TaskController@store')->name('task.store');
    Route::delete('dashboard/lista/tarea/tarea/{id}', 'System\TaskController@destroy')->name('task.destroy');
    Route::get('dashboard/lista/tarea/{id}', 'System\TaskController@show')->name('task.show');
    Route::put('dashboard/lista/tarea/{id}', 'System\TaskController@update')->name('task.update');
    Route::get('dashboard/tareas/{id}', 'System\TaskController@getTask')->name('task.getTask');

});




