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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['role']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    
    Route::get('/event','Admin\EventController@index');
    Route::post('/create_event', 'Admin\EventController@store');
    Route::get('/event-edit/{eventid}','Admin\EventController@eventedit');
    Route::put('/event-update/{eventid}','Admin\EventController@eventupdate');
    Route::delete('/event-delete/{id}','Admin\EventController@eventdelete');

    Route::get('/ticket','Admin\TicketController@index');
    Route::post('/create_ticket', 'Admin\TicketController@store');
    Route::get('/ticket-edit/{ticketid}','Admin\TicketController@ticketedit');
    Route::put('/ticket-update/{ticketid}','Admin\TicketController@ticketupdate');
    Route::delete('/ticket-delete/{id}','Admin\TicketController@ticketdelete');



});
