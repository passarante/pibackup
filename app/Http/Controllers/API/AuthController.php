<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $existingsUser = User::where("email", $request->email)->first();

        if ($existingsUser) {

            if (Hash::check($request->password, $existingsUser->password)) {

                $userToken = $existingsUser->createToken("token")->plainTextToken;
                return response()->json([
                    "user" => [
                        "name" => $existingsUser->name,
                        "email" => $existingsUser->email
                    ],
                    "token" => $userToken,
                    "success" => "true"
                ], 200);
            } else {
                return response()->json(["message" => "Invalid Credentials"], 401);
            }
        } else {
            return response()->json(["message" => "User not found"], 404);
        }


        //return $request->email;
    }
}
