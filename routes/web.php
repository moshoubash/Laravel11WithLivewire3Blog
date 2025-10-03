<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\PostDetails;
use App\Livewire\PostForm;
use App\Livewire\PostEdit;

Route::get('/', Home::class)->name('home');

Route::get('/post/create', PostForm::class)->name('post.create')->middleware('auth');

Route::get('/post/{id}', PostDetails::class)->name('post.details');

Route::delete('/post/{id}', [PostDetails::class, 'delete'])->name('delete-post')->middleware('auth');

Route::get('/post/{id}/edit', PostEdit::class)->name('post.edit')->middleware('auth');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
