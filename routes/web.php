<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [FrontendController::class, 'landing'])->name('landing');

Route::get('/eligibility-form', [FrontendController::class, 'jobSeeker'])->name('jobSeeker');


Route::get('/admin/login', [AuthController::class, 'login'])->name('login');

Route::post('/admin/login', [AuthController::class, 'verifyLogin'])->name('verifyLogin');

Route::get('/admin/register', [AuthController::class, 'register'])->name('register');

Route::get('/admin/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');



// Route::inertia('/eligibility-form', 'EligibilityForm')->name('jobSeeker');
// return Inertia::render('Welcome', [
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
// ]);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
