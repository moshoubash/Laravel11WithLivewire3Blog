<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Chat;
use App\Livewire\PostDetails;
use App\Livewire\PostForm;
use App\Livewire\PostEdit;
use App\Livewire\Profile;
use App\Livewire\SearchResults;
use App\Livewire\Notifications;
use App\Events\MessageSent;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

Route::get('/', Home::class)->name('home');

Route::get('/home', Home::class)->name('home');

Route::get('/chat', Chat::class)->name('chat');

Route::get('/post/create', PostForm::class)->name('post.create')->middleware('auth');

Route::get('/post/{slug}', PostDetails::class)->name('post.details');

Route::get('/post/{slug}/edit', PostEdit::class)->name('post.edit')->middleware('auth');

Route::get('/search/results/{q}', SearchResults::class)->name('search.results');

Route::get('/notifications', Notifications::class)->name('notifications')->middleware('auth');

Route::get('/profile', Profile::class)->name('profile')->middleware('auth');

// google register oauth2.0

Route::get('/auth/google/redirect', function() {
    return Socialite::driver("google")->redirect();
});

Route::get('/auth/google/callback', function () {
    $socialiteUser = Socialite::driver('google')->user();
    
    if (User::where('email', $socialiteUser->email)->exists()) {
        Auth::login(User::where('email', $socialiteUser->email)->first());
        return redirect('/home');
    }

    $user = User::updateOrCreate([
        'name' => $socialiteUser->name,
        'email' => $socialiteUser->email,
        'password' => bcrypt('1'),
        'is_admin' => false,
        'provider' => "google",
        'provider_id' => $socialiteUser->id,
        'registration_domain' => env('APP_URL'),
    ]);
 
    Auth::login($user);
 
    return redirect('/home');
});

Route::post('/chat/send', function() {
    broadcast(new MessageSent(request('message'), request('email')));
    return back()->with('success', 'Your message has been sent!');
});

require __DIR__.'/auth.php';