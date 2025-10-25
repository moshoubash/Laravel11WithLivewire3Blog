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
use App\Livewire\Stats;
use App\Livewire\Settings;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

Route::group(['middleware' => ['throttle:limiter']], function () {
    Route::get('/', Home::class);
    Route::get('/home', Home::class)->name('home');
    Route::get('/chat', Chat::class)->name('chat');
    Route::get('/post/{slug}', PostDetails::class)->name('post.details');
    Route::get('/search/results/{q}', SearchResults::class)->name('search.results');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/post/{slug}/edit', PostEdit::class)->name('post.edit');
        Route::get('/posts/create', PostForm::class)->name('post.create');
        Route::get('/notifications', Notifications::class)->name('notifications');
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/stats', Stats::class)->name('stats');
        Route::get('/settings', Settings::class)->name('settings');
    });
});

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
})->middleware('throttle:5,1')->name('chat.send');

require __DIR__.'/auth.php';