<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $tasks = DB::table('tasks')->get()->where('id', '=', $id);

        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        
    }
}
