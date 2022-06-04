<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UtilitiesController;
use App\Models\User;

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
Route::get('/students/form', [StudentController::class, 'create']);
Route::get('/students/view', function () {
    return view('students.view');
});

Route::get('/utilities', [UtilitiesController::class, 'index']);
Route::get('/utilities/form', function () {
    return view('utility.form');
});

Route::get('/process-payment', [PaymentController::class, 'index']);

Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list', [UserController::class, 'list']);
    Route::post('/', [UserController::class, 'store']);
    Route::delete('/{user}/user', [UserController::class, 'destroy']);
    Route::get('/{user}/edit', [UserController::class, 'show']);
    Route::get('/form', [UserController::class, 'create']);
    Route::put('/{user}', [UserController::class, 'update']);
});

Route::get('/reports', [ReportController::class, 'index']);;
