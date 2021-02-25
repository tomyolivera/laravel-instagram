<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $id = 5;
        $profile = DB::table('users')->where('id', '=', $id)->get()->first();

        return view('profile.index')->with("profile", $profile);
    }

}
