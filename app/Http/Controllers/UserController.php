<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create (Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12',
        ]);
        
        $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user, 'access_token'=>$accessToken]);
    }

    public function login (Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:12',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message' => 'Username/Password salah'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response (['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function logout (Request $request){
        $request->user()->token()->revoke();
        return response()->json([
        'message' => 'Successfully logged out'
    ]);
    }
}
