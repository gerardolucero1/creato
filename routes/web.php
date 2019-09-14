<?php

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
    Route::match(['get', 'post'], '/dashboard', 'System\SystemController@index');

    // Portfolio routes
    Route::get('dashboard/portafolio', 'System\PortfolioController@index')->name('portfolio.index');
    Route::get('dashboard/portafolio/create', 'System\PortfolioController@create')->name('portfolio.create');
    Route::post('dashboard/portafolio', 'System\PortfolioController@store')->name('portfolio.store');
    Route::get('dashboard/portafolio/{id}', 'System\PortfolioController@edit')->name('portfolio.edit');
    Route::put('dashboard/portafolio/{id}', 'System\PortfolioController@update')->name('portfolio.update');
    Route::delete('dashboard/portafolio/{id}', 'System\PortfolioController@destroy')->name('portfolio.delete');


    // Quotation Routes
    Route::get('dashboard/cotizaciones', 'System\QuotationController@index')->name('quotation.index');
    Route::post('Quotation', 'System\QuotationController@store')->name('quotation.store');
    Route::delete('dashboard/cotizaciones/{id}', 'System\QuotationController@destroy')->name('quotation.delete');
    Route::get('Quotation{id}', 'System\QuotationController@show')->name('quotation.show');

    // ProfileRoutes
    Route::get('dashboard/perfil', 'System\ProfileController@index')->name('users.Profile');
    Route::get('dashboard/perfil/create', 'System\ProfileController@create')->name('profile.create');
    Route::post('dashboard/perfil', 'System\ProfileController@store')->name('profile.store');
    Route::get('dashboard/perfil/{id}', 'System\ProfileController@edit')->name('profile.edit');
    Route::put('dashboard/perfil/{id}', 'System\ProfileController@update')->name('profile.update');

});




