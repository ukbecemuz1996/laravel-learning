<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/students', function () {
//     return "Read All Students";
// });

// Route::get('/students/{id}', function ($id) {
//     return "Read Single Student With ID: " . $id;
// });

// Route::post('/students', function () {
//     return "Create New Student";
// });

// Route::put('/students/{id}', function (Request $request, $id) {
//     return "Update Single Student With ID: " . $id;
// });

// Route::delete('/students/{id}', function ($id) {
//     return "Delete Single Student With ID: " . $id;
// });

Route::get('/students', [StudentController::class, 'readAll']);

Route::get('/students/{id}', [StudentController::class, 'read']);

Route::post('/students', [StudentController::class, 'create']);

Route::put('/students/{id}', [StudentController::class, 'update']);

Route::delete('/students/{id}', [StudentController::class, 'delete']);
