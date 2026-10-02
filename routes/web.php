<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudentController;
Route::get("/students", [StudentController::class, "index"]);
Route::get("/students/create", [StudentController::class, "create"]);
Route::post("/students", [StudentController::class, "store"]);
Route::delete("/students/{id}", [StudentController::class, "destroy"]);
