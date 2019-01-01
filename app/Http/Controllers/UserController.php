<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::all();
        if (app('auth')->user()->role == 0) {
            return view('admin.user.index', compact('user'));
        } else {
            return 'halaman tidak ditemukan';
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role'      => 'required',
        ]);
        $user = New User;

        $user->name     =   $request->get('name');
        $user->email    =   $request->get('email');
        $user->password =   bcrypt($request->get('password'));
        $user->role     =   $request->get('role');
        $user->remember_token = str_random(10);

        $user->save();
        
        if ($user->save()) {
            return redirect()->back();
        }
        else {
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.form', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->name     =   $request->get('name');
        $user->email    =   $request->get('email');
        $user->password =   bcrypt($request->get('password'));
        $user->role     =   $request->get('role');
        $user->remember_token = str_random(10);

        $user->save();
        return redirect('/user');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
