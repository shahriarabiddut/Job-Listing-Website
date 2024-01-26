<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\RecruiterController;
use App\Http\Controllers\Admin\RecruiterDepartmentController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });
    Route::middleware('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    // Settings Crud
    Route::get('jobs/', [HomeController::class, 'jobs'])->name('jobs.index');
    Route::get('jobs/application', [HomeController::class, 'application'])->name('jobs.application');
    Route::get('jobs/application/{id}', [ApplicationController::class, 'show'])->name('jobs.application.show');

    Route::get('settings/', [HomeController::class, 'editSetting'])->name('settings.edit');
    Route::put('settings/update/{id}', [HomeController::class, 'updateSetting'])->name('settings.update');
    //Profile
    Route::get('/profile', [HomeController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');
    // Email Crud
    Route::get('email/{id}/delete', [EmailController::class, 'destroy']);
    Route::resource('email', EmailController::class);

    // Student Routes
    Route::get('user/{id}/delete', [UserController::class, 'destroy']);
    Route::resource('user', UserController::class);

    // Department Routes
    Route::get('department/{id}/delete', [RecruiterDepartmentController::class, 'destroy']);
    Route::resource('department', RecruiterDepartmentController::class);

    // Recruiter 

    // Recruiter Crud
    Route::get('recruiter/{id}/delete', [RecruiterController::class, 'destroy']);
    Route::get('recruiter/{id}/change', [RecruiterController::class, 'change']);
    Route::put('recruiter/{id}/changeUpdate', [RecruiterController::class, 'changeUpdate'])->name('recruiter.changeUpdate');
    Route::resource('recruiter', RecruiterController::class);

    //Suport Ticekts View
    Route::get('support', [SupportController::class, 'adminIndex'])->name('support.index');
    Route::get('support/{id}', [SupportController::class, 'showAdmin'])->name('support.show');
});
