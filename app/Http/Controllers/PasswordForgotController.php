<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordForgotController extends Controller
{
    public function index() {
        return view('auth/forgot-password');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $user = User::where('email', $fields['email'])->first();

        $user['password_reset_token'] = $token;
        $user['password_reset_expires'] = Carbon::now()->addHours(2);


        Mail::send(new resetPassword($user, $token));

        $user->save();

        return redirect()->route('password-forgot.index')
            ->with('success', 'Recuperação enviada com sucesso. Siga os passos enviado em seu email!');
    }

}
