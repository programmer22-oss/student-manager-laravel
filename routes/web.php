<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Dashboard → redirect to students
Route::get('/dashboard', function () {
    return redirect('/students');
})->middleware(['auth'])->name('dashboard');


// Home → redirect to students
Route::get('/', function () {
    return redirect('/students');
});

// Auth required routes
Route::middleware(['auth'])->group(function () {

    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/create', [StudentController::class, 'create']);
    Route::post('/students', [StudentController::class, 'store']);

    Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
    Route::post('/students/{id}', [StudentController::class, 'update']);

    Route::get('/students/{id}/delete', [StudentController::class, 'destroy']);
});

// Breeze auth routes (DO NOT REMOVE)
require __DIR__ . '/auth.php';
