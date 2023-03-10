<?php

namespace App\Http\Controllers;

use App\User;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class usercontroller extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name'      =>['required'],
            'email'     =>['required', 'email', 'unique:users'],
            'password'  =>['required', 'min:8']
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('message', "usted a eliminado un usuario");
        return back();
    }
}
