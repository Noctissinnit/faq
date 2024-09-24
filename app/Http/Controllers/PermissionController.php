<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('permission', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::where('id', $request->role_id)->first();
        $permissions = Permission::all();

        DB::beginTransaction();
        foreach($permissions as $permission){
            if($request->input($permission->name) === 'on'){
                $role->givePermissionTo($permission);
            } else {
                $role->revokePermissionTo($permission);
            }
        }
        DB::commit();
        
        return redirect()->route('permission.index');
    }
}
