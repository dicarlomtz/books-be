<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response([
            'message' => 'User created',
            'user' => $user,
            'token' =>  $user->createToken('API TOKEN')->plainTextToken
        ]);
    }

    public function loginUser(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response([
                'message' => 'Email or password invalid'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response([
            'message' => 'User logged',
            'user' => $user,
            'token' =>  $user->createToken('API TOKEN')->plainTextToken
        ]);
    }

}
