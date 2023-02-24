<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission_list()
    {
        $permissions = Permission::all();
        return view('UserManagement.permissions.permissions-list',compact('permissions'));
    }
}
