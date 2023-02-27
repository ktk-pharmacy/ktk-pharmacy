<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission_list()
    {
        $permissions = Permission::all();
        return view('UserManagement.permissions.permissions-list',compact('permissions'));
    }

    public function create(Request $request)
    {
        $roles = Role::all();
        return view('UserManagement.permissions.permission-create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = Permission::create([
            'name' => $name,
        ]);

        if (!empty($request['roles'])) {
            $roles = $request['roles'];

            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record
                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }
        return to_route('permission_list')->with('success', 'Successfully created permission!');
    }

    public function edit(Request $request,Permission $permission)
    {
        $roles = Role::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.permission_id",$permission->id)
            ->pluck('role_has_permissions.role_id','role_has_permissions.role_id')
            ->all();
        return view('UserManagement.permissions.permission-edit', compact('permission', 'roles', 'rolePermissions'));
    }

    public function update(Request $request,Permission $permission)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission->name = $name;
        $permission->save();

        $permission->syncRoles($request['roles']);
        return to_route('permission_list')->with('success', 'Successfully updated permission!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
