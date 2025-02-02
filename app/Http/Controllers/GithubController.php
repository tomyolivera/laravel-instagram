<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use DateTime;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->stateless()->user();
            
            $findUser = User::where('github_id', $user->user["id"])->first();
            
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
                    'photo' => $user->user["avatar_url"],
                    'name' => $user->user["login"],
                    'username' => $rand,
                    'email' => $user->email,
                    'github_id' => $user->user["id"],
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
