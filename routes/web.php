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

use App\Http\Controllers\WelcomeController;
// use Symfony\Component\Routing\Annotation\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home','Admin\DashboardController@dashboard');

Route::get('/event/{eventid}','EventController@eventedit');



Auth::routes();

Route::get('/','WelcomeController@welcome');
Route::post('/booking/store',array('as'=>'booking/store','uses'=>'BookingController@store'));

Route::group(['middleware'=>['role']], function(){
    //  Route::get('dashboard',array('as'=>'dashboard','uses'=>'DashboardController@index'));
    Route::get('/dashboard','Admin\DashboardController@dashboard');
    Route::get('/booking',"BookingController@booking");
    
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


Route::get('/about',"AboutController@about");
Route::get('/content',"ContentController@content");
Route::get('/welcome',"WelcomeController@welcome");
Route::get('/detail',"DetailController@detail");
Route::get('/booking',array('as'=>'booking','uses'=>'BookingController@booking'));
Route::get('/frontend/index',array('as'=>'booking','uses'=>'BookinglistController@index'));

// Route::get('booking/{id}', array('as'=>'booking','uses'=>'WelcomeController@create'));