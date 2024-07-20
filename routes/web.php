<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\UniController;
use Illuminate\Support\Facades\Route;

Route::resource('', CVController::class);

Route::post("/uni/add", [UniController::class, "store"])->name("addUni");
Route::get("/uni", [UniController::class, "index"])->name("uni");