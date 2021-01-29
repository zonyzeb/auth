<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \App\Events\ActivityLoggerEvent;

class AuthController extends Controller
{
	/**
	*
	*
	**/
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        event(new ActivityLoggerEvent($user, 'api_registration'));

        return response(['user' => $user, 'access_token' => $accessToken], 201);
    }

    /**
	*
	*
	**/
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        event(new ActivityLoggerEvent(auth()->user(), 'api_login'));

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}
