<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $emailExist = User::where('email', $google_user->getEmail())->exists();

                if ($emailExist) {
                    session()->flash('error', 'The Email has already been taken.');
                    return redirect()->route('login');
                }

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'password' => encrypt(Str::random()),
                ]);
                $new_user->assignRole('user');

                Auth::login($new_user);

                return redirect()->intended();
            } else {
                Auth::login($user);

                return redirect()->intended();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage(), "error");
        }
    }
}
