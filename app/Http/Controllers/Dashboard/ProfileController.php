<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', [
            'user' => $user,
            'countries' => Countries::getNames('en'),
            'locales' => Languages::getNames('en'),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($file->isValid()) {
                $path = $file->store('/images', [
                    'disk' => 'public'
                ]);
                $data['avatar'] = $path;
            }
        }

        $user->profile->fill($data)->save();

        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'Profile updated!');
    }
}
