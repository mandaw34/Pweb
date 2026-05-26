<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
return redirect()->route('students.index');
});
Route::resource('students', StudentController::class);

Route::get('/latihan', [StudentController::class, 'latihan'])->name('students.latihan');