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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private const UPDATED_SUCCESS = "Data updated successfully";
    private const ERR_UPDATED = "Something went wrong!";
    private const ERR_USERNAME_EXISTS = "The username is already taken";

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
        if(User::where('username', $request->username)->first() && $request->username != Auth::user()->username){
            return new Response([self::ERR_USERNAME_EXISTS, false]);
        }else{
            $user = Auth::user();

            $this->validate($request, [
                'name' => ['required', 'string', 'min:3', 'max:30'],
                'username' => ['required', 'string', 'min:6', 'max:35', 'unique:users,username,' . $user->id],
                'email' => ['required', 'email'],
                'status' => ['required']
            ]);
            
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->update();
            
            return new Response([self::UPDATED_SUCCESS, true]);
        }
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
        if(Auth::user()->photo != "nophoto.png") Storage::disk('users')->delete(Auth::user()->photo);

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

    public function destroy()
    {
        return DB::table('users')->where('id', Auth::user()->id)->delete();
    }
}