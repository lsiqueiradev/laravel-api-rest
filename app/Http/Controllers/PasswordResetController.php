<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function index(String $token) {
        $user = User::where('password_reset_token', $token)->first();

        if(!$user)
        {
            return redirect()
                ->route('password-forgot.index')
                ->withInput()
                ->withErrors(['The token provided is not valid. Try generating a new one!']);
        }

        $now = Carbon::now();
        if($now->gt($user->password_reset_expires))
        {
            return redirect()
                ->route('password-forgot.index')
                ->withInput()
                ->withErrors(['The token entered has expired. Try generating a new one!']);
        }

        return view('auth.reset-password');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'token' => 'required|string|exists:users,password_reset_token',
            'password' => 'required',
            'confirm_password'=> 'required|same:password',
        ]);

        $user = User::where('password_reset_token', $fields['token'])->first();

        if(!$user)
        {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['The token provided is not valid. Try generating a new one!']);
        }

        $now = Carbon::now();
        if($now->gt($user->password_reset_expires))
        {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['The token entered has expired. Try generating a new one!']);
        }

        $user['password_reset_token'] = null;
        $user['password_reset_expires'] = null;
        $user['password'] = bcrypt($fields['password']);

        $user->save();

        $user->tokens()->delete();

        return redirect()->route('password-forgot.index')
            ->with('success', 'Password changed successfully. Enter the app again!');
    }

}
