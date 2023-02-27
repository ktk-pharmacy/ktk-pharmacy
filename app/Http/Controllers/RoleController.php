<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function role_list()
    {
        if (auth()->user()->hasRole('Superadmin')) {
            $roles =  Role::all();
        } else {
            $roles =  Role::where('name', '!=', 'Superadmin')->get();
        }
        return view('UserManagement.roles.role-list',compact('roles'));
    }

    public function create(Request $request)
    {
        if (auth()->user()->hasRole('Superadmin')) {
            $permissions = Permission::all();
        } else {
            $role = Role::findByName('Superadmin');
            $permissions = Permission::whereNotIn('id', $role->permissions()->pluck('permissions.id'))->get();
        }

        return view('UserManagement.roles.role-create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        if (!empty($request['permissions'])) {
            $role->syncPermissions($request->input('permissions'));
        }

        return to_route('role_list')->with('success', 'Successfully created role!');
    }

    public function edit(Request $request,Role $role)
    {
        if (auth()->user()->hasRole('Superadmin')) {
            $permissions = Permission::all();
        } else {
            $role = Role::findByName('Superadmin');
            $permissions = Permission::whereNotIn('id', $role->permissions()->pluck('permissions.id'))->get();
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('UserManagement.roles.role-edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request,Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role->name = $request->input('name');
        $role->save();

        if (!empty($request['permissions'])) {
            $role->syncPermissions($request->input('permissions'));
        }
        return to_route('role_list')->with('success', 'Successfully updated role!!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }
}
