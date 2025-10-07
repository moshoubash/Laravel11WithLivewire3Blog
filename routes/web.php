<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Chat;
use App\Livewire\PostDetails;
use App\Livewire\PostForm;
use App\Livewire\PostEdit;
use App\Livewire\SearchResults;
use App\Livewire\Notifications;
use App\Events\MessageSent;

Route::get('/', Home::class)->name('home');

Route::get('/home', Home::class)->name('home');

Route::get('/chat', Chat::class)->name('chat');

Route::get('/post/create', PostForm::class)->name('post.create')->middleware('auth');

Route::get('/post/{slug}', PostDetails::class)->name('post.details');

Route::get('/post/{slug}/edit', PostEdit::class)->name('post.edit')->middleware('auth');

Route::get('/search/results/{q}', SearchResults::class)->name('search.results');

Route::get('/notifications', Notifications::class)->name('notifications')->middleware('auth');

Route::post('/chat/send', function() {
    broadcast(new MessageSent(request('message'), request('email')));
    return back()->with('success', 'Your message has been sent!');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
