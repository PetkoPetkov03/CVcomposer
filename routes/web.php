<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\TechController;
use App\Http\Controllers\UniController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CVController::class, "create"])->name("index");

Route::post("/uni/add", [UniController::class, "store"])->name("uni.store");
Route::get("/uni", [UniController::class, "index"])->name("uni");

Route::post("/tech/add", [TechController::class, "store"])->name("tech.store");
Route::get("/tech", [TechController::class, "index"])->name("tech");

Route::post("/cv/add", [CVController::class, "store"])->name("cv.store");

Route::get("/cv/show/{person}/{cv}", [CVController::class, "show"])->name("cv.show");

Route::get("cv/date", [CVController::class, "showByDate"])->name("cv.date");

Route::get("cv/agregate", [CVController::class, "agregate"])->name("cv.agregate");