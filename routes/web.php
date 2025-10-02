<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {return view('home');} )->name('home');
Route::get('/post/create', function() {return view('create-post');} )->name('create-post');