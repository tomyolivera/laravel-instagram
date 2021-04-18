<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = DB::table('tasks')->where('user_id', Auth::user()->id)->orderBy('for_', 'asc')->get();
        $cat = DB::table('category_tasks')->where('user_id', '=', Auth::user()->id)->get();

        return $request->ajax() 
                ? ["tasks" => $tasks,
                    "categories" => $cat]
                : view('tasks.index');
    }

    public function valid(Request $request)
    {
        return $this->validate($request, [
            'description' => ['max:800']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->description = $request->description;
        $task->category_id = $request->category_id;
        $task->for_ = $request->for;
        $task->user_id = Auth::user()->id;

        return $task->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->for = $request->for;
        return $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('tasks')->where('id', '=', $id)->where('user_id', '=', Auth::user()->id)->delete();
    }
}
