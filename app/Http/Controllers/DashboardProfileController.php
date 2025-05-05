<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditProfileRequest;

class DashboardProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(EditProfileRequest $editProfileRequest)
    {
        $user = Auth::user();

        try {
            // Update user data
            $user->name = $editProfileRequest->name;
            $user->email = $editProfileRequest->email;

            if ($editProfileRequest->filled('password')) {
                $user->password = Hash::make($editProfileRequest->password);
            }

            $user->save();

            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('profile.index')->withInput($editProfileRequest->all())->withErrors([$th->getMessage()]);
        }
    }
}
