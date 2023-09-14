<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:users|max:255',
            'password'=>'required|min:6',
        ]);

        // Create a new user with a hashed password
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        // Generate an access token for the authenticated user
        $token = $user->createToken('auth_token')->accessToken;

        // Return the token
        return response([
            'token'=>$token
        ]);
    }
    public function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'The provided credentials are incorrect!',
            ], 401);
        }

        $token = $user->createToken('auth_token')->accessToken;

        return response([
            'token'=>$token
        ]);

    }
    public function logout(Request $request){
        //Revoke User
        $request->user()->token()->revoke();

        return response([
            'message'=>'Logged out successfully!',
        ]);

    }
}
