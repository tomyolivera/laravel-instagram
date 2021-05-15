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
use Exception;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getUsers()
    {
        $data = DB::select(
            "   SELECT u.id, u.name, u.username, u.email, u.created_at, u.status, GROUP_CONCAT(r.name) AS 'role_name'
                FROM model_has_roles mhr
                RIGHT JOIN users u ON u.id = mhr.model_id
                JOIN roles r ON r.id = mhr.role_id
                GROUP BY u.id, u.name, u.username, u.email, u.created_at, u.status
            "
        );

        return ["data" => $data];
    }

    /**
     * @return array
     */
    public function deleteUser(Request $request): array
    {
        try {
            Task::where('user_id', $request->id)->delete();
            CategoryTask::where('user_id', $request->id)->delete();
            Like::where('user_id', $request->id)->delete();
            Comment::where('user_id', $request->id)->delete();
            Publication::where('user_id', $request->id)->delete();
            DB::table('model_has_roles')->where('model_id', $request->id)->delete();
            User::where('id', $request->id)->delete();

            return ['msg' => "User deleted successfully"];
        } catch (Exception $e) {
            return ['msg' => "Error: " + $e->getMessage()];
        }
    }

    /**
     * @return array
     */
    public function getUserStats(): array
    {
        // Users
        $CANT_USERS = User::select('id')->count();

        // Dark Mode
        $CANT_DARK_MODE_ON = User::select('id')->where('dark_mode', 1)->count();
        $CANT_DARK_MODE_OFF = $CANT_USERS - $CANT_DARK_MODE_ON;
      
        // Status
        $CANT_USERS_OFFLINE = User::select('id')->where('status', 0)->count();
        $CANT_USERS_ONLINE = User::select('id')->where('status', 1)->count();
        $CANT_USERS_BUSY = User::select('id')->where('status', 2)->count();
    
        // Login with social media account
        $CANT_USERS_LOGGED_BY_GITHUB = User::select('id')->where('github_id', '!=', null)->count();
        $CANT_USERS_LOGGED_BY_GOOGLE = User::select('id')->where('google_id', '!=', null)->count();

        // Variables
        $amount = [
            "total_users" => $CANT_USERS,
            "dark_mode" => $CANT_DARK_MODE_ON,
            "light_mode" => $CANT_DARK_MODE_OFF,
            "online" => $CANT_USERS_ONLINE,
            "offline" => $CANT_USERS_OFFLINE,
            "busy" => $CANT_USERS_BUSY,
            "google" => $CANT_USERS_LOGGED_BY_GOOGLE,
            "github" => $CANT_USERS_LOGGED_BY_GITHUB,
        ];

        // Return variables
        return [ 'amount' => $amount ];
    }

    /**
     * @return array
     */
    public function getPublicationStats(): array
    {
        $CANT_PUBLICATIONS = Publication::select('id')->count();

        

        // Variables
        $amount = [
            'total_publications' => $CANT_PUBLICATIONS
            
        ];

        // Return variables
        return [ 'amount' => $amount ];
    }
}
