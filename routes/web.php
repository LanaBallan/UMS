<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [PagesController::class, 'index'])->name('home-page');
Route::get("/about", [PagesController::class, 'about']);
Route::get("/courses", [PagesController::class, 'courses']);
Route::get("/portfolio", [PagesController::class, 'portfolio']);
Route::get("/contact", [PagesController::class, 'contact']);
Route::get("/subject/add", [SubjectController::class, 'add']);
Route::post("/subject/store", [SubjectController::class, 'store']);
Route::get("/subject/all", [SubjectController::class, 'all']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
Route::post('/subject/edit/{id}',[SubjectController::class, 'update'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
