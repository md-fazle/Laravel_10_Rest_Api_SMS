<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//student
Route::get('students',[StudentController::class,'index']);
Route::post('students',[StudentController::class,'store']);
Route::get('students/{id}',[StudentController::class,'show']);
Route::get('students/{id}/edit',[StudentController::class,'edit']);
Route::put('students/{id}/edit',[StudentController::class,'update']);
Route::delete('students/{id}/delete',[StudentController::class,'destroy']);


//teacher

Route::get('teachers',[TeacherController::class,'index']);
Route::post('teachers',[TeacherController::class,'store']);
Route::get('teachers/{id}',[TeacherController::class,'show']);
Route::get('teachers/{id}/edit',[TeacherController::class,'edit']);
Route::put('teachers/{id}/edit',[TeacherController::class,'update']);
Route::delete('teachers/{id}/delete',[TeacherController::class,'destroy']);



//register
Route::post('/register',[RegisterController::class,'store']);

//login
Route::post('/login',[LoginController::class,'check']);

