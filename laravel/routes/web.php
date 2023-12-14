<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/customers/create', 'CustomersSQLController@create')
// ->name('customers.create');
// Route::post('/customers', 'CustomersSQLController@store')
// ->name('customers.store');
// Route::get('/customers', 'CustomersSQLController@index')
// ->name('customers.index');

Route::resource('/customers', \App\Http\Controllers\SQL\CustomersSQLController::class);


