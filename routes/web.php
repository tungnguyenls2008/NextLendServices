<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/create-customer-type', function () {
    return view('services/customerType/create');
})->name('customer_type_create');
Route::get('/display-customer-type', function () {
    return view('services/customerType/display');
})->name('customer_type_display');
Route::post('create-customer-type',array('as'=>'services.create-customer-type','uses'=>'Customer\CustomerTypeController@create'));
