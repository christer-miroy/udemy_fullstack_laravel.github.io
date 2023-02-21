<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Controllers */
use App\Http\Controllers\Api\SClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* start student class api routes */
Route::get('/class', [SClassController::class, 'Index']); // get all classes
Route::post('/class/store', [SClassController::class, 'Store']); //insert new class
Route::get('/class/edit/{id}', [SClassController::class, 'Edit']); //select class name to be updated
Route::post('/class/update/{id}', [SClassController::class, 'Update']); //update selected class
Route::delete('/class/delete/{id}', [SClassController::class, 'Delete']); //delete selected class
/* end student class api routes */

/* start subject api routes */
Route::get('/subject', [SubjectController::class, 'Index']); // get all subject
Route::post('/subject/store', [SubjectController::class, 'Store']); //insert new subject
Route::get('/subject/edit/{id}', [SubjectController::class, 'Edit']); //select subject to be updated
Route::post('/subject/update/{id}', [SubjectController::class, 'Update']); //update selected subject
Route::delete('/subject/delete/{id}', [SubjectController::class, 'Delete']); //delete selected subject
/* end subject api routes */

/* start section api routes */
Route::get('/section', [SectionController::class, 'Index']); // get all section
Route::post('/section/store', [SectionController::class, 'Store']); //insert new section
Route::get('/section/edit/{id}', [SectionController::class, 'Edit']); //select section to be updated
Route::post('/section/update/{id}', [SectionController::class, 'Update']); //update selected section
Route::delete('/section/delete/{id}', [SectionController::class, 'Delete']); //delete selected section
/* end section api routes */

/* start student api routes */
Route::get('/student', [StudentController::class, 'Index']); // get all student
Route::post('/student/store', [StudentController::class, 'Store']); //insert new student
Route::get('/student/edit/{id}', [StudentController::class, 'Edit']); //select student to be updated
Route::post('/student/update/{id}', [StudentController::class, 'Update']); //update selected student
Route::delete('/student/delete/{id}', [StudentController::class, 'Delete']); //delete selected student
/* end student api routes */