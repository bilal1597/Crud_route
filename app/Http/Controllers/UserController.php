<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    //
    public function allUsers()
    {
        $all_users = User::all();
        return view('/users', compact('all_users'));
    }

    public function loadAddUser()
    {
        return view('/add-user');
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirm' => 'same:password',

        ]);

        $user = User::create($data);

        if ($user) {
            return redirect('/users');
        }
    }


    public function loadEditForm($id)
    {
        $user = User::find($id);

        return view('/edit-user', compact('user'));
    }

    public function editUser(Request $request)
    {
        // perform form validation here
        $data = $request->validate([
            'name' => 'required|string',
            'mobile_no' => 'required',
            'email' => 'required|email',

        ]);


        $user = User::where('id', $request->id)->update($data);

        if ($user) {
            return redirect('/users')->with('success', 'User Updated Successfully');
        }

        // User::where('id', $request->id)->update([
        //     'name' => $request->name,
        //     'mobile_no' => $request->mobile_no,
        //     'email' => $request->email,
        // ]);


    }


    public function deleteUser($id)
    {
        // $delete_user = User::where('id', $id);
        $delete_user = User::findOrfail($id);
        $delete_user->delete();
        return redirect('/users')->with('success', 'User Deleted successfully!');
    }



    ///////////////////////////////// Authentication ////////////////////////////////////////
}
