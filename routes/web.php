<?php

///use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('layouts', TaskController::class);

///Route::get('/', function () {
///    return view('app');
///})

;
