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

Route::resource('Dentists','DentistController');
Route::resource('Appointment','AppointmentController');
Route::resource('Patient','PatientController');
Route::resource('Service','ServiceController');