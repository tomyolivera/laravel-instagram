<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                $findUser->status = 1;
                $findUser->update();

                Auth::login($findUser);

                return redirect('/');
            }else{

                $newUser = User::create([
                    'photo' => $user->avatar,
                    'name' => $user->name,
                    'username' => "",
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt("123abcfacer123facer123"),
                ]);

                Auth::login($newUser);

                return redirect('/');
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
