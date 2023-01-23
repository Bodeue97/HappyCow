<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function assignRoles()
    {
        $users = User::all();



        return view('admin.roles')->with('users', $users);
    }

    public function assignRolesEdit($user_id)
    {
        $user = User::find($user_id);



        return view('admin.role_edit')->with('user', $user);
    }

    public function saveRole(Request $request){
        $user = User::find($request->input('user_id'));
        $user->update([
            'role'=>$request->input('role')
        ]);

        return redirect('/admin_roles');


    }




}
