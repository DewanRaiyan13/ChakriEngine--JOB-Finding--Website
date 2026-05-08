<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobWebController;

Route::get('/', [JobWebController::class, 'index']);
Route::get('/jobs', [JobWebController::class, 'jobs']);
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/categories', 'home'); // Placeholder redirect
