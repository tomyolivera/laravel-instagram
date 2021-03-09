<?php

namespace App\Http\Controllers;

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
    private const UPDATED_SUCCESS = "The data was updated successfully";

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        return view('user.index');
    }
    
    public function update(Request $request)
    {
        // Get user data
        $user = Auth::user();

        // Get request data
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $status = $request->input('status');
        
        // If user data and form data are equal, return view
        if($status != 0 && $status != 1 && $status != 2) return redirect('user');

        if( ($status == $user->status) && ($name == $user->name) && ($username == $user->username) && ($email == $user->email) ) return redirect('user');

        // Validate fields
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:60'],
            'username' => ['required', 'string', 'min:6', 'max:35', 'unique:users,username,' . $user->id],
            'email' => ['required', 'email', 'max:150', 'unique:users,email,' . $user->id],
            'status' => ['required']
        ]);
        
        // Set / Update image
        $photo = $request->file('photo');

        if($photo){
            $photo_name = time() . $photo->getClientOriginalName();

            Storage::disk('users')->put($photo_name, File::get($photo));

            $user->photo = $photo_name;
        }
        
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->status = $status;
        
        // Update table
        $user->update();

        // Redirect to "My Profile"
        return redirect('user')->with('success', self::UPDATED_SUCCESS);
    }

    public function getPhoto($filename)
    {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

}
