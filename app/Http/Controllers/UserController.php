<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private const UPDATED_SUCCESS = "Data updated successfully";
    private const ERR_UPDATED = "Something went wrong!";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return $request->ajax() 
                ? ["user" => Auth::user()]
                : view('user.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate fields
        // $validate = $this->validate($request, [
        //     'name' => ['required', 'string', 'min:3', 'max:30'],
        //     'username' => ['required', 'string', 'min:6', 'max:35', 'unique:users,username,' . $user->id],
        //     'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        //     'status' => ['required']
        // ]);

        // Get & Set request data
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;
        
        // Update table
        $user->update();
        
        return new Response(self::UPDATED_SUCCESS);
    }

    public function setDarkMode(Request $request)
    {
        $user = Auth::user();
        $user->dark_mode = $request->darkMode;

        $user->update();

        return new Response(self::UPDATED_SUCCESS);
    }

    public function getPhoto($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function updatePhoto(Request $request)
    {
        $this->validate($request, [
            'photo' => ['required', 'image']
        ]);

        $user = Auth::user();

        // Set / Update image
        $photo = $request->photo;
        $photo_name = time() . $photo->getClientOriginalName();
        Storage::disk('users')->put($photo_name, File::get($photo));
        
        $user->photo = $photo_name;
        $user->update();

        return new Response(["msg" => self::UPDATED_SUCCESS, "photo_name" => $user->photo]);
    }

}