<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

 Route::get('/cache', function () {
     $startTime = microtime(true);

     Cache::remember('posts', now()->addMinute(), function () {
         sleep(2);
         return Post::where('name', 'like', '%jesus%')
             ->orderBy('content', 'desc')
             ->orderBy('views', 'asc')
             ->limit(5000)
             ->get();
     });

     $endTime = microtime(true);

     $executionTime = $endTime - $startTime;
     echo "Query executed in {$executionTime} seconds.";
    });
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
