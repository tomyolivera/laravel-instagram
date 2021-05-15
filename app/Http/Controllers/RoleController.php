<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
        $roles = Role::get();
        $permissions = Permission::get();
        $role_has_permissions = $this->getRolesAndPermissions();

        return $request->ajax()
                ? ["roles" => $roles, 
                    "permissions" => $permissions, 
                    "role_has_permissions" => $role_has_permissions,
                ]
                : view('admin.roles');
    }

    public function userIsAllowedToByRole($myRole, $foreignRole)
    {
        $myRoleId = Role::select('id')->where('name', $myRole)->get();

        $rolesThatRoleCanDo = Role::select('name')->where('id', '<', $myRoleId[0]->id)->get();
        
        return $this->searchInArray($foreignRole, $rolesThatRoleCanDo);
    }

    public function getRolesAndPermissions(){
        return DB::select(
            "   SELECT r.name AS 'role', r.color, GROUP_CONCAT(p.name) AS 'permissions'
                FROM role_has_permissions rhp
                JOIN roles r ON r.id = rhp.role_id
                JOIN permissions p ON p.id = rhp.permission_id
                GROUP BY r.name, r.color
                ORDER BY r.id ASC
            ");
    }

    public function getAuthUserPermissions(){
        $user = Auth::user();

        $mhr = DB::select(
            "   SELECT r.id
                FROM model_has_roles mhr
                JOIN roles r ON r.id = mhr.role_id
                WHERE model_id = $user->id
            ");

        $roles = [];

        for ($i=0; $i < count($mhr); $i++) { 
            $role = DB::select(
                "   SELECT p.name
                    FROM role_has_permissions rhp
                    JOIN roles r ON r.id = rhp.role_id
                    JOIN permissions p ON p.id = rhp.permission_id
                    WHERE r.id IN (" . (string)$mhr[$i]->id . ")
                    GROUP BY p.name
                ");
                
            array_push($roles, $role);
        }

        return $roles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
