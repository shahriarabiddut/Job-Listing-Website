<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Recruiter\JobController;
use App\Http\Controllers\Recruiter\HomeController;
use App\Http\Controllers\Recruiter\EmailController;
use App\Http\Controllers\Recruiter\Auth\RegisteredUserController;
use App\Http\Controllers\Recruiter\Auth\AuthenticatedSessionController;

//Recruiter Routes
Route::namespace('Recruiter')->prefix('recruiter')->name('recruiter.')->group(function () {
    Route::namespace('Auth')->middleware('guest:recruiter')->group(function () {
        //Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
        //Register Route
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });
    Route::middleware('recruiter')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
Route::middleware('recruiter')->prefix('recruiter')->name('recruiter.')->group(function () {
    // Email Crud
    Route::get('email/{id}/delete', [EmailController::class, 'destroy']);
    Route::resource('email', EmailController::class);
    //Profile
    Route::get('/profile', [HomeController::class, 'view2'])->name('profile.view');
    Route::get('/profile/edit', [HomeController::class, 'edit2'])->name('profile.edit');
    Route::put('/profile/edit', [HomeController::class, 'update'])->name('profile.update');
    //Suport Ticekts View And Reply
    Route::get('support', [SupportController::class, 'recruiterIndex'])->name('support.index');
    Route::get('support/{id}', [SupportController::class, 'recruiterAdmin'])->name('support.show');
    Route::get('support/{id}/reply', [SupportController::class, 'recruiterReply'])->name('support.reply');
    Route::put('support/{id}', [SupportController::class, 'recruiterReplyUpdate'])->name('support.replyUpdate');
    // JOB POSTING CRUD
    Route::get('job/{id}/delete', [JobController::class, 'destroy'])->name('job.delete');
    Route::resource('job', JobController::class);
    // View Application
    Route::get('application/{id}/view', [ApplicationController::class, 'showRecruiter'])->name('application.showRecruiter');
});
