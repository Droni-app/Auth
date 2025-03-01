<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [WebController::class, 'index']);
