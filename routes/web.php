<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TownshipController;
use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('school.master');
});

route::get('home',[DashboardController::class,'dashboard']);

route::get('add/student/form',[StudentController::class,'addStudentForm']);
route::get('student/form',[StudentController::class,'studentForm']);
route::post('add/student',[StudentController::class,'addStudetn']);
route::get('student/delete/{id}',[StudentController::class,'studentDelete']);
route::get('student/edit/{id}',[StudentController::class,'studentEdit']);
route::post('student/update',[StudentController::class,'studentUpdate']);
route::get('search/student',[StudentController::class,'searchStudent']);

route::get('teacher/page',[TeacherController::class,'teacherPage']);
route::get('add/teacher/page',[TeacherController::class,'addTeacherPage']);
route::post('add/teacher',[TeacherController::class,'addTeacher']);
route::get('teacher/update/page/{id}',[TeacherController::class,'teacherUpdatePage']);
route::post('teacher/update',[TeacherController::class,'teacherUpdate']);
route::get('search/teacher',[TeacherController::class,'searchTeacher']);

route::post('add/grade',[GradeController::class,'addGrade']);

route::post('add/class',[ClassController::class,'addClass']);

route::post('add/township',[TownshipController::class,'addTownship']);
route::get('ajax/search/township',[TownshipController::class,'searchTownship']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
