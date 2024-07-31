<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CourseController::class, 'index']);
Route::get('/content/{course:slug}', [CourseController::class, 'showContents']);
Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/', [CourseController::class, 'store']);
Route::get('/course/edit/{course}', [CourseController::class, 'edit']);
Route::put('/{course}', [CourseController::class, 'update']);
Route::delete('/course/delete/{course}', [CourseController::class, 'destroy']);

Route::get('/content/create/{course:slug}', [ContentController::class, 'create']);
Route::post('/content/{course:slug}', [ContentController::class, 'store']);
Route::get('/content/{course:slug}/edit/{content}', [ContentController::class, 'edit']);
Route::put('/content/{course:slug}/{content}', [ContentController::class, 'update']);
Route::delete('/content/{course:slug}/delete/{content}', [ContentController::class, 'destroy']);