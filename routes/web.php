<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobWebController;

Route::get('/', [JobWebController::class, 'index']);
