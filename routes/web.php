<?php

use App\Livewire\Home;
use App\Livewire\PostForm;
use App\Livewire\PostDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class )->name('home');

Route::get('/post/create', PostForm::class )->name('create-post');

Route::get('/post/{id}', PostDetails::class )->name('post-details');

Route::delete('/post/delete/{id}', [PostDetails::class, 'delete'])->name('delete-post');