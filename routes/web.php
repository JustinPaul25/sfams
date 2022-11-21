<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\BranchPortalController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\StudentPortalController;

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

Route::get('/password-reset', function() {
    return view('password-reset');
});

Route::post('/password-reset', [UserController::class, 'resetPassword']);

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
    Route::post('/pay-branch', [PaymentController::class, 'branch']);

    Route::get('/branches', [BranchController::class, 'index']);
    Route::get('/branch-list', [BranchController::class, 'list']);
    Route::get('/branch/{branch}', [BranchController::class, 'view']);
    Route::get('/branch/{branch}/pay', [BranchController::class, 'pay']);
    Route::get('/branch/{branch}/transactions', [BranchController::class, 'transactions']);
    Route::get('/branch/{branch}/account', [BranchController::class, 'account']);

    Route::get('/enroll-data', [EnrollController::class, 'datas']);
});

Route::group(['middleware' => ['role:Administrator']], function () {
    Route::get('/utilities', [UtilitiesController::class, 'index']);
    Route::get('/utilities/list', [UtilitiesController::class, 'list']);
    Route::put('/utility/{paymentUtility}', [UtilitiesController::class, 'update']);
    Route::get('/utilities/form', function () {
        return view('utility.form');
    });

    Route::get('/branch-utlity/{branchUtility}', [UtilitiesController::class, 'branch']);
    Route::put('/branch-utility/{branchUtility}', [UtilitiesController::class, 'branchUpdate']);
    Route::get('/branches/form', [BranchController::class, 'create']);
    Route::post('/branch', [BranchController::class, 'store']);

    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/list', [UserController::class, 'list']);
        Route::post('/', [UserController::class, 'store']);
        Route::delete('/{user}/user', [UserController::class, 'destroy']);
        Route::get('/{user}/edit', [UserController::class, 'show']);
        Route::get('/form', [UserController::class, 'create']);
        Route::put('/{user}', [UserController::class, 'update']);
    });

    Route::get('/transactions', [TransactionsController::class, 'list']);
    Route::get('/full-transactions', [TransactionsController::class, 'fullTransactions']);

    Route::get('/logs', [LogsController::class, 'index']);
});

Route::group(['middleware' => ['role:Staff']], function () {
    
});

Route::group(['middleware' => ['role:Student']], function () {
    Route::get('/my-profile', [StudentPortalController::class, 'profile']);
    Route::get('/student-account', [StudentPortalController::class, 'account']);
    Route::get('/notifications', [NotificationController::class, 'index']);
});

Route::group(['middleware' => ['role:Branch']], function () {
    Route::get('/branch-account', [BranchPortalController::class, 'account']);
});
