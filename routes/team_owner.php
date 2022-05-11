<?php

use App\Http\Controllers\Team_owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Team_owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Team_owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Team_owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Team_owner\Auth\NewPasswordController;
use App\Http\Controllers\Team_owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Team_owner\Auth\RegisteredUserController;
use App\Http\Controllers\Team_owner\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Team_owner\TeamController;
use App\Http\Controllers\Team_owner\PlayerController;
use App\Http\Controllers\Team_owner\GamesController;
use App\Http\Controllers\Team_owner\GameResultsController;
use App\Http\Controllers\Team_owner\TeamMembersController;



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
//     return view('team_owner.welcome');
// });


// Route::get('/dashboard', function () {
//     return view('team_owner.dashboard');
// })->middleware(['auth:team_owners'])->name('dashboard');

// Route::resource('teams', TeamOwnersController::class)
//     ->middleware('auth:team_owners')->except(['show']);

Route::middleware('auth:team_owners')->group(function () {
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    // Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');
});

// Route::prefix('teams')
//     ->middleware('auth:team_owners')->group(function () {
//         Route::get('index', [TeamOwnersController::class, 'index'])->name('teams.index');
//         Route::get('edit/{team}', [TeamOwnersController::class, 'edit'])->name('teams.edit');
//         Route::post('update/{team}', [TeamOwnersController::class, 'update'])->name('teams.update');
//     });

Route::prefix('games')
    ->middleware('auth:team_owners')->group(function () {
        Route::get('/', [GamesController::class, 'index'])->name('games.index');
        Route::get('create', [GamesController::class, 'create'])->name('games.create');
        Route::post('store', [GamesController::class, 'store'])->name('games.store');
        Route::get('edit/{game}', [GamesController::class, 'edit'])->name('games.edit');
        Route::post('update/{game}', [GamesController::class, 'update'])->name('games.update');
        Route::get('/handle', [GamesController::class, 'handle'])->name('games.handle');
    });

Route::prefix('results')
    ->middleware('auth:team_owners')->group(function () {
        Route::get('/', [GameResultsController::class, 'index'])->name('results.index');
        Route::get('edit/{result}', [GameResultsController::class, 'edit'])->name('results.edit');
        Route::post('update/{result}', [GameResultsController::class, 'update'])->name('results.update');
        Route::get('manual', [GameResultsController::class, 'manual'])->name('results.manual');
    });

Route::resource('players', PlayerController::class)
    ->middleware('auth:team_owners')->except(['show']);

Route::resource('recruitment_members', TeamMembersController::class)
    ->middleware('auth:team_owners')->except(['show']);

// Route::get('/register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest');

// Route::get('/register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest');

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
