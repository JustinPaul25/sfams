<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UtilitiesController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/form', function () {
    return view('students.form');
});
Route::get('/students/view', function () {
    return view('students.view');
});

Route::get('/utilities', [UtilitiesController::class, 'index']);
Route::get('/utilities/form', function () {
    return view('utility.form');
});

Route::get('/process-payment', [PaymentController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
// Route::get('/utilities/form', function () {
//     return view('utility.form');
// });
