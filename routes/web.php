<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/form', [formcontroller::class, 'createuserform']);

Route::resource('form', FormController::class);

Route::get('/', [FormController::class, 'index']);