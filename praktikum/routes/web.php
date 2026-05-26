<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;

Route::get('/products', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);

Route::get('/', function (){
return 'Selamat Datang di Laravel';
});

Route::get('/', function () {
return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/product/{id}', function ($id){
return 'Produk ID: ' . $id;
});

Route::get('/dashboard', function (){
return 'Halaman Dashboard';
})->name('dashboard');

Route::prefix('admin')->group(function () {
Route::get('/dashboard', function() {
return 'Admin Dashboard';
});

Route::get('/products', function (){
return 'Data Products';
});
});

Route::get('/products', function () {
$products = [
'Laptop',
'Mouse',
'Keyboard'
];
return view('products', compact('products'));
});

Route::get('/students', [StudentController::class, 'index']);
Route::resource('students', StudentController::class);