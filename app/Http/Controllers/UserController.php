<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_list()
    {
        try{
            if (auth()->user()->hasRole('Superadmin')) {
                $users = User::all();
            } else {
                $users = User::whereHas('roles', function ($query) {
                    $query->where('name', '!=', 'Superadmin');
                })->get();
            }
            return view('users-list', compact('users'));
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong UsersController.users_list',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('Superadmin')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('name', '!=', 'Superadmin')->get();
        }

        return view('UserManagement.users.user-create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        if (!empty($request['roles'])) {
            $user->assignRole($request->input('roles'));
        }

        return to_route('user_list')->with('success', 'Successfully created users!');
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
    public function edit(User $user)
    {
        if (auth()->user()->hasRole('Superadmin')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('name', '!=', 'Superadmin')->get();
        }
        $userRole = $user->roles->pluck('id', 'id')->all();

        return view('UserManagement.users.user-edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user->update($input);
        $user->syncRoles($request->input('roles'));

        return to_route('user_list')->with('success', 'Sucessfully User Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
