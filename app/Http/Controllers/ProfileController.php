<?php

namespace App\Http\Controllers;

use App\Models\{ Project, User };
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();
        $projects = Project::with('user')->where('user_id', $user->id)->get();
        return Inertia::render('Profile/Index', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }

    public function projects($id)
    {
        // $user = Auth::user();
        $user = User::where('id', $id)->first();
        $projects = Project::with('user')->where('user_id', $user->id)->get();
        // dd($projects);
        return Inertia::render('Profile/Projects', [
            'projects' => $projects,
            'user' => $user
        ]);
    }

    public function schedule($id)
    {
        $user = User::where('id', $id)->first();
        $projects = Project::with('user')->where('user_id', $user->id)->get();
        return Inertia::render('Profile/Schedule', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, $id): Response
    {
        $user = User::where('id', $id)->first();
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $user
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
