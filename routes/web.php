<?php

use App\Http\Controllers\AdController;
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


        Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::prefix('manager')->name('manager.')->group(function(){
        Route::middleware(['guest'])->group(function(){
        Route::view('/login','login')->name('login');

    });
        Route::middleware(['auth'])->group(function(){
            Route::get('/home',[\App\Http\Controllers\ManagerController::class, 'home'] )->name('home');
        Route::post('/logout',[\App\Http\Controllers\ManagerController::class,'logout'])->name('logout');
        Route::post('/create',[\App\Http\Controllers\ManagerController::class,'create'])->name('create');
        Route::view('/register','Manager Dashboard.register')->name('register');
        Route::post('/check',[\App\Http\Controllers\ExamsEmployeeController::class, 'check'] )->name('check');
            Route::get('/marks/edit', [MarkController::class, 'edit']);
            Route::post('/mark/update',[MarkController::class, 'update'] );
            Route::get('/marks/edit/log', [MarkController::class, 'editLog']);
    });
});

        Route::prefix('exams')->name('exams.')->group(function(){
        Route::middleware(['guest:examsEmployee'])->group(function(){
        Route::view('/login','login')->name('login');
        Route::post('/check',[\App\Http\Controllers\ExamsEmployeeController::class, 'check'] )->name('check');
    });
        Route::middleware(['auth:examsEmployee'])->group(function(){
        Route::get('/home',[\App\Http\Controllers\ExamsEmployeeController::class, 'home'] )->name('home');
        ////////////////////mark routes////////////////
        Route::get("/mark/add", [MarkController::class, 'add']);
        Route::post("/mark/store", [MarkController::class, 'store']);
        Route::get("/mark/check/subjects", [MarkController::class, 'checkSubjects']);
        Route::get("/mark/check/marks/{id}", [MarkController::class, 'checkMarks']);
        Route::post("/mark/confirm", [MarkController::class, 'confirm']);
        Route::get("/mark/all", [MarkController::class, 'all']);
        Route::get("/mark/lists", [MarkController::class, 'list']);
            Route::get('/mark/export',[MarkController::class, 'getMarkLists']);
////////////////////end of mark routes////////////////
/// ///////////////////////subject routes////////////////////
        Route::get("/subject/add", [SubjectController::class, 'add']);
        Route::post("/subject/store", [SubjectController::class, 'store']);
        Route::get("/subject/all", [SubjectController::class, 'all']);
        Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);
        Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
        Route::post('/subject/edit/{id}',[SubjectController::class, 'update'] );
///////////////////end of subject routs/////////////////////////
///////////////////search routes////////////////////////////
        Route::get("/search", [StudentController::class, 'examsSearch']);
        Route::get("/student/marks/{id}", [MarkController::class, 'examsGetStudentMarks']);
////////////////////end of search routes///////////////////////
/////////////////////////student lists routes/////////////////
            Route::get("/student/lists", [StudentController::class, 'examsLists']);
            Route::get('/lists/export',[StudentController::class, 'getLists']);
///////////////////////// end of student list routes///////////

//////////////////document requests routes/////////////////////
        Route::get("/document-requests/all", [\App\Http\Controllers\RequestController::class, 'allExamsDepartment']);
        Route::get('/document-requests/confirm/{id}', [\App\Http\Controllers\RequestController::class, 'confirmExamsDepartment']);
        Route::get('/document-requests/details/{id}', [\App\Http\Controllers\RequestController::class, 'detailsExamsDepartment']);
            Route::get('/document-requests/reject/{id}', [\App\Http\Controllers\RequestController::class, 'rejectExamsDepartment']);
        //////////////////end of document requests routes///////////////////////////////////////////
        ///////////////////objection requests////////////////////////////////////
        Route::get("/objection/prac/all", [\App\Http\Controllers\ObjectionController::class, 'allPrac']);
        Route::get("/objection/theo/all", [\App\Http\Controllers\ObjectionController::class, 'allTheo']);
            Route::get("/obj/details/{id}", [\App\Http\Controllers\ObjectionController::class, 'details']);
            Route::post("/mark/update/{id}", [\App\Http\Controllers\MarkController::class, 'objUpdate']);
            Route::get("/obj/delete/{id}", [\App\Http\Controllers\ObjectionController::class, 'delete']);
        ////////////////////end of objection request////////////////////////////
        ////////////////////reprac requests////////////////////////////////
            Route::get("/re-prac/manage", [\App\Http\Controllers\RePracController::class, 'manage']);
            Route::post("/re-prac/status/update", [\App\Http\Controllers\RePracController::class, 'update']);
            Route::get("/re-prac/all", [\App\Http\Controllers\RePracController::class, 'all']);
        /////////////////////end of reprac request///////////////////
        Route::post('/logout',[\App\Http\Controllers\ExamsEmployeeController::class,'logout'])->name('logout');
    });

});
        Route::prefix('affairs')->name('affairs.')->group(function(){
        Route::middleware(['guest:affairsEmployee'])->group(function(){
        Route::view('/login','login')->name('login');
        Route::post('/check',[\App\Http\Controllers\ExamsEmployeeController::class, 'check'] )->name('check');
    });
        Route::middleware(['auth:affairsEmployee'])->group(function(){

            Route::get('/home',[\App\Http\Controllers\AffairsEmployeeController::class, 'home'] )->name('home');
        Route::post('/logout',[\App\Http\Controllers\AffairsEmployeeController::class,'logout'])->name('logout');
////////////////////student routes////////////////
        Route::get("/student/add", [StudentController::class, 'add']);
        Route::post("/student/store", [StudentController::class, 'store']);
        Route::get("/student/all", [StudentController::class, 'all']);
            Route::get("/students/name/sort", [StudentController::class, 'nameSort']);
            Route::get("/students/avg/sort", [StudentController::class, 'avgSort']);
        Route::get('/student/delete/{id}', [StudentController::class, 'delete']);
        Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
        Route::post('/student/edit/{id}',[StudentController::class, 'update'] );
//////////////////////end of student routes////////////////
/////////////////////ad routes/////////////////////////////
        Route::get("/ad/add", [AdController::class, 'add']);
        Route::post("/ad/store", [AdController::class, 'store']);
        Route::get("/ad/all", [AdController::class, 'all']);
        Route::get('/ad/delete/{id}', [AdController::class, 'delete']);
        Route::get('/ad/edit/{id}', [AdController::class, 'edit']);
        Route::post('/ad/edit/{id}',[AdController::class, 'update'] );
////////////////////end of ad routes///////////////////////
////////////////////search routes/////////////////////////
            Route::get('/search', [StudentController::class, 'affairsSearch']);
            Route::get("/student/marks/{id}", [MarkController::class, 'affairsGetStudentMarks']);
///////////////////end of search routes//////////////////
/////////////////////////student lists routes/////////////////
            Route::get("/student/lists", [StudentController::class, 'affairsLists']);
            Route::get('/lists/export',[StudentController::class, 'getLists']);
///////////////////////// end of student list routes///////////
//////////////////////student classes routes////////////////
            Route::get("/student/classes", [StudentController::class, 'classes']);
            Route::get('/classes/export',[StudentController::class, 'getClasses']);
//////////////////////end of student classes routes/////////////
//////////////////////edit uni info routes///////////////////////
            Route::get("/uniInfo/add", [StudentController::class, 'addUniInfo']);
            Route::post("/uniInfo/store", [StudentController::class, 'storeUniInfo']);
//////////////////////end of edit uni info routes////////////////
/////////////////////points////////////////////
            Route::get("/points/add", [StudentController::class, 'addPoints']);
            Route::post("/points/store", [StudentController::class, 'storePoints']);
/////////////////////end of points///////////////////
//////////////////document requests routes////////////////
        Route::get("/document-requests/all", [\App\Http\Controllers\RequestController::class, 'allAffairsDepartment']);
        Route::get('/document-requests/confirm/{id}', [\App\Http\Controllers\RequestController::class, 'confirmAffairsDepartment']);
        Route::get('/document-requests/details/{id}', [\App\Http\Controllers\RequestController::class, 'detailsAffairsDepartment']);
            Route::get('/document-requests/reject/{id}', [\App\Http\Controllers\RequestController::class, 'rejectAffairsDepartment']);
        //////////////////end of document requests routes///////////////////////////////////////////
    });


});
