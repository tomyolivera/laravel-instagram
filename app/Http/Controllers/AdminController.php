<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getUsers()
    {
        return DB::select(
            "   SELECT u.id, u.name, u.username, u.email, u.verified, u.dark_mode, u.created_at, u.status, u.google_id, u.github_id, GROUP_CONCAT(r.name) AS 'role_name'
                FROM model_has_roles mhr
                JOIN users u ON u.id = mhr.model_id
                JOIN roles r ON r.id = mhr.role_id
                GROUP BY u.id, u.name, u.username, u.email, u.verified, u.dark_mode, u.created_at, u.status, u.google_id, u.github_id
            "
        );
    }

    public function deleteUser(Request $request)
    {
        try {
            Task::where('user_id', $request->id)->delete();
            Publication::where('user_id', $request->id)->delete();
            User::where('id', $request->id)->delete();
            return ['msg' => "User deleted successfully"];
        } catch (Exception $e) {
            return ['msg' => "Error: " + $e->getMessage()];
        }
    }

    public function getStatistics()
    {
        $CANT_USERS = User::select('id')->count();

        // Dark Mode
        $CANT_DARK_MODE_ON = User::select('id')->where('dark_mode', 1)->count();
        $PERC_DARK_MODE = (string)(round($CANT_DARK_MODE_ON / $CANT_USERS * 100));

        // Status
        $status = [
            $CANT_USERS_OFFLINE = User::select('id')->where('status', 0)->count(),
            $CANT_USERS_ONLINE = User::select('id')->where('status', 1)->count(),
            $CANT_USERS_BUSY = User::select('id')->where('status', 2)->count(),
            "PERC_USERS_ONLINE" => (string)(round($CANT_USERS_ONLINE / $CANT_USERS * 100)),
            "PERC_USERS_OFFLINE" => (string)(round($CANT_USERS_OFFLINE / $CANT_USERS * 100)),
            "PERC_USERS_BUSY" => (string)(round($CANT_USERS_BUSY / $CANT_USERS * 100)),
        ];

        // Return variables
        return [
            'CANT_USERS' => $CANT_USERS,
            'PERC_DARK_MODE' => $PERC_DARK_MODE,
            'status' => $status
        ];
    }
}
