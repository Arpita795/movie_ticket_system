<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieControllers;
use App\Jobs\SendEmailJob;
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

// Route::get('/', function () {
//     return view('c');
// });


Route::get('/', 'MovieController@displayTicket');
Route::get('display-ticket', 'MovieController@displayTicket');
Route::get('movie-ticket/{id}', 'MovieController@movieTicket');
Route::post('book-ticket', 'MovieController@bookTicket');
