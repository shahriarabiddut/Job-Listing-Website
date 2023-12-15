<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;

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

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/jobdetails/{id}', [HomeController::class, 'jobdetails'])->name('jobdetails');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
Route::get('/home', function () {
    return redirect()->route('root');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

//User Routes
// Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->name('user.dashboard');
// Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->middleware(['auth', 'verified'])->name('user.dashboard');
Route::get('user', [ProfileController::class, 'index2'])->middleware(['auth'])->middleware(['auth', 'verified'])->name('user.profile');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'view2'])->name('profile.view');
    // Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/edit', [ProfileController::class, 'edit2'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Support Routes
    Route::get('support/{id}/delete', [SupportController::class, 'destroy'])->name('support.destroy');
    Route::resource('support', SupportController::class);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/staff.php';
