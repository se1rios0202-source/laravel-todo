<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/',[TaskController::class,'index']);
Route::post('/task/store',[TaskController::class,'store']);
Route::get('/task/{id}/edit',[TaskController::class,'edit']);