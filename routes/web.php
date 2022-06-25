<?php

use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentController;
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

///////////////////////subject routes////////////////////
Route::get("/subject/add", [SubjectController::class, 'add']);
Route::post("/subject/store", [SubjectController::class, 'store']);
Route::get("/subject/all", [SubjectController::class, 'all']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
Route::post('/subject/edit/{id}',[SubjectController::class, 'update'] );
/////////////////end of subject routs/////////////////////////

////////////////////mark routes////////////////
Route::get("/mark/add", [MarkController::class, 'add']);
Route::post("/mark/store", [MarkController::class, 'store']);
Route::get("/mark/all", [MarkController::class, 'all']);
Route::get('/mark/delete/{id}', [MarkController::class, 'delete']);
Route::get('/mark/edit/{id}', [MarkController::class, 'edit']);
Route::post('/mark/edit/{id}',[MarkController::class, 'update'] );
////////////////////end of mark routes////////////////

////////////////////student routes////////////////
Route::get("/student/add", [StudentController::class, 'add']);
Route::post("/student/store", [StudentController::class, 'store']);
Route::get("/student/all", [StudentController::class, 'all']);
Route::get('/student/delete/{id}', [StudentController::class, 'delete']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/edit/{id}',[StudentController::class, 'update'] );
//////////////////////end of student routes////////////////
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('manager')->name('manager.')->group(function(){
    Route::middleware(['guest'])->group(function(){
        Route::view('/login','auth.login')->name('login');
        Route::view('/register','auth.register')->name('register');
        Route::post('/create',[\App\Http\Controllers\ManagerController::class,'create'])->name('create');
        Route::post('/check',[\App\Http\Controllers\ManagerController::class, 'check'] )->name('check');
    });
    Route::middleware(['auth'])->group(function(){

        Route::view('/home','home')->name('home');
        Route::post('/logout',[\App\Http\Controllers\ManagerController::class,'logout'])->name('logout');


    });


});



Route::prefix('exam')->name('exam.')->group(function(){

/////////////if it's not login
    Route::middleware(['guest:exam'])->group(function(){

Route::view('login','auth.Exams Dashboard.login')->name('login');
Route::post('/check',[\App\Http\Controllers\ExamsEmployeeController::class, 'check'] )->name('check');

    });

    Route::middleware(['auth:exam'])->group(function(){
        Route::view('home','Exams Dashboard.home')->name('home');
    });


});
