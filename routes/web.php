<?php

use App\Http\Controllers\ApiProxyController;
use App\Http\Controllers\StoragePublicController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
| Public disk files: fallback when static /storage is missing or symlink is blocked (403).
| Ensure `php artisan storage:link` on deploy, or enable FollowSymLinks for public/storage.
*/
Route::get('/storage/{path}', [StoragePublicController::class, 'show'])
    ->where('path', '.*');

/*
| All /api/* requests are proxied to BACKEND_URL (main Laravel + React API).
| Same-origin fetch from Blade/JS works like the React app (session holds token after login).
*/
Route::any('/api/{path?}', [ApiProxyController::class, 'forward'])->where('path', '.*');

Route::get('/', [StorefrontController::class, 'landing'])->name('home');
Route::get('/auth', [StorefrontController::class, 'signIn'])->name('auth');
Route::get('/register', [StorefrontController::class, 'register'])->name('register');
Route::get('/dashboard', [StorefrontController::class, 'dashboard'])
    ->middleware('api.session')
    ->name('dashboard');

/** Same React bundle as the main SPA (AdminPanel); requires admin role in session. */
Route::get('/admin', [StorefrontController::class, 'admin'])
    ->middleware(['api.session', 'admin.session'])
    ->name('admin');

Route::post('/logout', function () {
    $base = rtrim((string) config('app.backend_url'), '/');
    $tok = session('api_token');
    if ($tok !== null && $base !== '') {
        try {
            Http::withToken($tok)->post($base.'/api/auth/logout');
        } catch (Throwable) {
            /* ignore */
        }
    }
    session()->forget(['api_token', 'api_user']);

    return redirect()->route('home');
})->name('logout');
