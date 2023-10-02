<?php

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/v1/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/v1/students/{student}', [StudentController::class, 'show'])->name('student.show');
Route::delete('/v1/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


Route::get('/v1/testValue', [Test::class, 'index'])->name('test.index');
Route::get('/v1/fuzzy', [Test::class, 'fuzzy']);
Route::post('/v1/validate', [Test::class, 'validTest']);
Route::get('/v1/response', [Test::class, 'respTest']);
