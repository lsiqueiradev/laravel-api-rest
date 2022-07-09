<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password'=> 'required|same:password',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        return response()->json([], 204);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'],$user->password))
        {
            return response()->json([
                'error' => 'Invalid credentials',
            ], 401);
        }

        if($user->status !== 1)
        {
            return response()->json([
                'error' => 'Inactive user, contact support',
            ], 401);
        }

        $return = User::generateCode($user->id);

        if ($return) {
            return response()->json([
                'user_id' => $user->id
            ], 200);
        } else {
            return response()->json([
                'error' => 'There was a problem sending the code, please try again later!',
            ], 401);
        }

        // $token = $user->createToken('myapptoken')->plainTextToken;

        // $response = [
        //     'user' => $user,
        //     'token' => $token,
        // ];

        // return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out'], 201);
    }

}
