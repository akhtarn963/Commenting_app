<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function usersList(){
        $users = User::paginate(10);
        return view('admin/users',compact('users'));
    }

    public function deletUser($id){
       $user = User::find($id);
       $user->delete();
       return redirect('/admin/users-list')->with('status', 'User deleted!');
    }
}