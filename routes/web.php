<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

//Student CRUD
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::view('/student/create', 'crud.student.add');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::post('/student/show', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.delete');

// Teacher CRUD

Route::controller(TeacherController::class)->prefix('teacher')->name('teacher.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

// Customer CRUD

Route::resource('customer', CustomerController::class);