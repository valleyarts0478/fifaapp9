<?php

use App\Http\Controllers\Team_Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Team_Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Team_Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Team_Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Team_Owner\Auth\NewPasswordController;
use App\Http\Controllers\Team_Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Team_Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Team_Owner\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Team_owner\TeamController;

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

// Route::get('/', function () {
//     return view('owner.welcome');
// });

Route::get('/dashboard', function () {
    return view('team_owner.dashboard');
})->middleware(['auth:team_owners'])->name('dashboard');

// Route::resource('teams', TeamController::class)
//     ->middleware('auth:team_owners')->except(['show']);

Route::prefix('teams')
    ->middleware('auth:team_owners')->group(function () {
        Route::get('index', [TeamController::class, 'index'])->name('teams.index');
        Route::get('edit/{team}', [TeamController::class, 'edit'])->name('teams.edit');
        Route::post('update/{team}', [TeamController::class, 'update'])->name('teams.update');
    });

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:team_owners')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:team_owners', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:team_owners', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:team_owners')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:team_owners');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:team_owners')
    ->name('logout');
