<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function handleProviderCallback($provider = "google")
    {
        $user = User::create([
            'name' => $socialiteUser->name,
            'email' => $socialiteUser->email,
            'provider' => $provider,
            'provider_id' => $socialiteUser->id,
            'registration_domain' => $domain
        ]);

        Auth::login($user, true);
        return redirect('/home');
    }
}
