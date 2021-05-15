<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Type\Time;

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
                $datetime = new DateTime();
                $timestamp = $datetime->getTimestamp();
                $rand = "facer_" . (string)($timestamp) . (string)rand(10, 99);

                $newUser = User::create([
                    'photo' => $user->avatar,
                    'name' => $user->name,
                    'username' => $rand,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => '',
                ]);

                $newUser->assignRole('user');

                Auth::login($newUser);

                return redirect('/');
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
