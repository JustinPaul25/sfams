<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\NotificationController;

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

Route::get('/online-enrollment', [EnrollmentController::class, 'index'])->name('online-enrollment');
Route::post('/student', [EnrollmentController::class, 'store']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:Administrator|staff']], function () {
    Route::get('/reports', [ReportController::class, 'index']);

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students-list', [StudentController::class, 'list']);
    Route::get('/students/form', [StudentController::class, 'create']);
    Route::get('/student/{student}', [StudentController::class, 'show']);
    Route::get('/student/{student}/edit', [StudentController::class, 'edit']);
    Route::put('/student/{student}/update', [StudentController::class, 'update']);
    Route::put('/student/{student}/update-requirements', [StudentController::class, 'updateRequirements']);
    Route::get('/student/{student}/pay-tuition', [StudentController::class, 'payTuition']);
    Route::get('/student/{student}/transactions', [StudentController::class, 'transactions']);
    Route::get('/student/{student}/account', [StudentController::class, 'account']);

    Route::get('/enrollment/{student}', [EnrollmentController::class, 'paymentForm']);
    Route::get('/enrollment-applications', [EnrollmentController::class, 'applications'])->name('application-list');
    Route::get('/enrollment-applications/list', [EnrollmentController::class, 'applicationList']);
    Route::post('/enrollment/new-student', [EnrollmentController::class, 'enrollNewStudent']);

    Route::post('/pay-tuition', [PaymentController::class, 'tuition']);
});

Route::group(['middleware' => ['role:Administrator']], function () {
    Route::get('/utilities', [UtilitiesController::class, 'index']);
    Route::get('/utilities/list', [UtilitiesController::class, 'list']);
    Route::put('/utility/{paymentUtility}', [UtilitiesController::class, 'update']);
    Route::get('/utilities/form', function () {
        return view('utility.form');
    });

    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/list', [UserController::class, 'list']);
        Route::post('/', [UserController::class, 'store']);
        Route::delete('/{user}/user', [UserController::class, 'destroy']);
        Route::get('/{user}/edit', [UserController::class, 'show']);
        Route::get('/form', [UserController::class, 'create']);
        Route::put('/{user}', [UserController::class, 'update']);
    });

    Route::get('/logs', [LogsController::class, 'index']);
});

Route::group(['middleware' => ['role:Staff']], function () {
    
});

Route::group(['middleware' => ['role:Student']], function () {
    Route::get('/my-profile', [StudentController::class, 'studentProfile']);
    Route::get('/notifications', [NotificationController::class, 'index']);
});
