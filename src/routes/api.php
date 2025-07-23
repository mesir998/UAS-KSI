<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

Route::post('/admin/students', [StudentController::class, 'store']);
Route::get('/admin/students/{student}', [StudentController::class, 'show']);
