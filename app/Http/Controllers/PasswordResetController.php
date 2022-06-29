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
                ->withErrors(['O token informado não é válido. Tente gerar um novo!']);
        }

        $now = Carbon::now();
        if($now->gt($user->password_reset_expires))
        {
            return redirect()
                ->route('password-forgot.index')
                ->withInput()
                ->withErrors(['O token informado expirou. Tente gerar um novo!']);
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
            ->withErrors(['O token informado não é válido. Tente gerar um novo!']);
        }

        $now = Carbon::now();
        if($now->gt($user->password_reset_expires))
        {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['O token informado expirou. Tente gerar um novo!']);
        }

        $user['password_reset_token'] = null;
        $user['password_reset_expires'] = null;
        $user['password'] = bcrypt($fields['password']);

        $user->save();

        $user->tokens()->delete();

        return redirect()->route('password-forgot.index')
            ->with('success', 'Senha alterada com sucesso. Entre no app novamente!');
    }

}
