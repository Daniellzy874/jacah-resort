<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                ]);

                Auth::login($new_user);
                User::where('id', Auth::user()->id)->update(['isActive' => 'online']);
                return redirect()->route('room');
            } else {

                Auth::login($user);
                User::where('id', Auth::user()->id)->update(['isActive' => 'online']);
                return redirect()->route('room');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong' . $th->getMessage());
        }
    }

    public function redirect_payment()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle_payment()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                ]);

                Auth::login($new_user);
                User::where('id', Auth::user()->id)->update(['isActive' => 'online']);
                return redirect()->route('payment');
            } else {

                Auth::login($user);
                User::where('id', Auth::user()->id)->update(['isActive' => 'online']);
                return redirect()->route('payment');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong' . $th->getMessage());
        }
    }
}
