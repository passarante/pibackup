<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {

        if (auth()->user()->role != "admin") {
            abort(401);
        }


        $users = User::where("role", "customer")->get();
        return view("users.index", compact("users"));
    }


    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {



        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "vkn" => "required|unique:users,vkn",
            "password" => "required",
            "license_finish" => "required|date"
        ]);


        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "vkn" => $request->vkn,
            "password" => Hash::make($request->password),
            "license_finish" => $request->license_finish,
            "role" => "customer"
        ]);

        return redirect()->route("users");
    }

    public function edit(User $user)
    {

        return view("users.edit", compact("user"));
    }

    public function update(User $user, Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email," . $user->id,
            "vkn" => "required|unique:users,vkn," . $user->id,
            "license_finish" => "required|date"

        ]);

        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "vkn" => $request->vkn,
            "license_finish" => $request->license_finish

        ];
        if (!empty($request->password)) {

            $data["password"] = Hash::make($request->password);
        }

        $user->update($data);


        return redirect()->route("users");
    }
}
