<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = \App\User::paginate(10);

        $filterKeyword = $request->get('keyword');
        $status = $request->get('status');

        if($filterKeyword) {
            if($status) {
                $users = \App\User::where('username', 'LIKE', "%$filterKeyword%")->where('status', $status)->orderBy('id', 'DESC')->paginate(10);
            } else {
                $users = \App\User::where('username', 'LIKE', "%$filterKeyword%")->orderBy('id', 'DESC')->paginate(10);
            }
        } else {
            if($status) {
                $users = \App\User::where('status', $status)->orderBy('id', 'DESC')->paginate(10);
            } else {
                $users = \App\User::orderBy('id', 'DESC')->paginate(10);
            }
        }

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:20|unique:users",
            "role" => "required",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ])->validate();

        $new_user = new \App\User;

        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->role = $request->get('role');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return redirect()->route('users.create')->with('status', 'User successfully created.');
    }

    public function show($id)
    {
        $user = \App\User::findOrFail($id);
        return view('users.show', ['user'=> $user]);
    }

    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "name" => "required|min:5|max:100",
            "role" => "required",
        ])->validate();

        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->role = $request->get('role');
        $user->status = $request->get('status');

        $user->save();
        return redirect()->route('users.edit', ['id' => $id])->with('status', 'User successfully updated.');

    }

    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User successfully deleted.');

    }
}
