<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorsController;


Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/majors', [MajorsController::class, 'index']);
Route::get('/majors/{major}/doctors', [MajorsController::class, 'doctors']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-message', [ContactController::class, 'sendMessage']);

// Route::get('/add_major', [MajorsController::class, 'major']);
// Route::Post('/add-major', [MajorsController::class, 'addmajor']);
Route::get('/doctors', [DoctorsController::class, 'index']);
Route::middleware('auth')->group(function(){
    Route::get('/appoinments/{user}', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/{user}', [AppointmentController::class,'store'])->name('appointments.store');
});

require_once('admin.php');
require_once( __DIR__. '/auth.php');
require_once( __DIR__. '/api.php');