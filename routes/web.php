<?php

use App\Models\Student;
use App\Models\Course;
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

Route::get('/students/create', function () {
    $student = new Student();
    $student->first_name = 'Kimmy';
    $student->last_name = 'Palen';
    $student->age = '20';
    $student->email = 'palenkimberly@gmail.com';
    $student->save();
    return 'Student Created';
});

Route::get('/students', function () {
    $students = Student::all();
    return $students;
});

Route::get('/students/update', function () {
    $student = student::where('email', 'palenkimberly31@gmail.com')->first();
    $student->email = 'kimberlypalen@gmail.com';
    $student->save();
    return 'Student Updated!';
});

Route::get('/students/delete', function () {
    $student = student::where('email', 'kimberlypalen@gmail.com')->first();
    $student->delete();
    return 'Student Deleted!';
});

Route::get('/courses/create', function () {
    $course = new Course();
    $course->course_name = 'Introduction to Databases';
    $course->save();
    return 'Course Created!';
});

Route::get('/course/{id}/students', function ($id) {
    $course = Course::find($id);
    return $course->students;
});
