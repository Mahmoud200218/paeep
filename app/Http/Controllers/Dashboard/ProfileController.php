<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Return the edit profile view with user, countries, and languages
        return view('dashboard.profile.edit', [
            'user' => $user,
            'countries' => Countries::getNames('en'), // List of country names in English
            'locales' => Languages::getNames('en'),   // List of language names in English
        ]);
    }

    /**
     * Handle the profile update request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Get the currently authenticated user
        $user = $request->user();

        // Get all form data
        $data = $request->all();

        // Check if avatar file was uploaded
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Ensure the file is valid
            if ($file->isValid()) {
                // Store the avatar image in public/images
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);

                // Add avatar path to data array
                $data['avatar'] = $path;
            }
        }

        // Update the user's profile with the submitted data
        $user->profile->fill($data)->save();

        // Redirect back to the edit form with a success message
        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'Profile updated!');
    }
}
