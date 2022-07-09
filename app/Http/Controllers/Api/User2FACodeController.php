<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Models\User;
use App\Models\User2FACode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class User2FACodeController extends Controller
{
    public function store(Request $request, string $user_id)
    {

        $fields = $request->validate([
            'code' => 'required|min:6|max:6',
        ]);

        $registeredCode = User2FACode::where([
            'user_id' => $user_id,
            'code' => $fields['code'],
        ])->first();


        if(!$registeredCode){
            return response()->json([
                'error' => 'You entered the invalid code.',
            ], 401);
        }

        $user = User::find($user_id);

        $token = $user->createToken('myapptoken')->plainTextToken;

        unset($user->password_reset_token);
        unset($user->password_reset_expires);

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        User2FACode::where('user_id', $user_id)->delete();

        return response()->json($response, 201);
    }

}
