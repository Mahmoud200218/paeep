<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SocialLoginController extends Controller
{
    // Redirect the user to the social provider's login page
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle the callback after the user logs in via the social provider
    public function callback($provider)
    {
        try {
            // Retrieve user data from the social provider
            $provider_user = Socialite::driver($provider)->user();

            // Check if a user with the same provider and provider_id exists in the database

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $provider_user->id
            ])->first();


            // If no user exists, create a new user record
            if (!$user) {
                $user = User::create([
                    'name' => $provider_user->name,
                    'email' => $provider_user->email,
                    'password' => Hash::make(Str::random(8)), // Generate any random password
                    'provider' => $provider,
                    'provider_id' => $provider_user->id,
                    'provider_token' => $provider_user->token,
                ]);
            }

            // Log the user in using Laravel's authentication
            Auth::login($user);

            // Redirect the user to the home page after successful login
            return redirect()->route('home');
        } catch (Throwable $e) {
            // Handle exceptions, such as if there was an error during the social login process
            // Redirect the user to the login page with an error message
            return redirect()->route('login')->withErrors([
                'email' => $e->getMessage(),
            ]);
        }
    }
}
