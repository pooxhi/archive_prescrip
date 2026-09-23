<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $oldPhotoPath = $user->profile_photo_path;

        if ($request->hasFile('profile_photo')) {
            $user->profile_photo_path = $request->file('profile_photo')
                ->store('profile-photos', 'public');
        } elseif ($request->boolean('remove_photo') && $user->profile_photo_path) {
            $user->profile_photo_path = null;
        }

        $user->save();

        if ($request->hasFile('profile_photo') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        if (
            $request->boolean('remove_photo')
            && ! $request->hasFile('profile_photo')
            && $oldPhotoPath
        ) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->prescriptions()->exists()) {
            return redirect()
                ->route('profile.edit')
                ->with('delete_error', 'Your account cannot be deleted because it is associated with existing prescription records.');
        }

        Auth::logout();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
