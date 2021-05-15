<?php

namespace App\Http\Controllers;

use App\Models\CategoryTask;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Publication;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view('dashboard.index');
    }

    // Users
    public function getUsers(Request $request)
    {
        $users = User::with('roles')->get();

        return $request->ajax()
            ? $users
            : view("dashboard.users");

        // return view("dashboard.users", [
        //     "users" => $users
        // ]);
    }

    public function destroyUser(int $id)
    {
        // CategoryTask::where('user_id', $id)->delete();
        // Task::where('user_id', $id)->delete();
        // Comment::where('user_id', $id)->delete();
        // Like::where('user_id', $id)->delete();
        // Publication::where('user_id', $id)->delete();
        // DB::table('role_user')->where('user_id', $id)->delete();
        User::where('id', $id)->delete();
    }

    // Roles
    public function getRoles()
    {
        // $roles = Role::all();
        $roles = DB::table('role_has_permissions AS rhp')
                    ->select("r.id", "r.name AS r_name", "r.color", "p.name AS p_name")
                    ->join('roles AS r', 'r.id', '=', 'rhp.role_id')
                    ->join('permissions AS p', 'p.id', '=', 'rhp.permission_id')
                    ->get();

        return view("dashboard.roles", ['roles' => $roles]);
    }
}
