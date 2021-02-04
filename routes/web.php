<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/api/students', [StudentController::class, 'api']);
Route::get('/', [StudentController::class, 'home']);