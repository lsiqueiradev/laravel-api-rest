<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use App\Mail\sendCode2FA;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public static function generateCode($user_id)
    {
        $user = User::find($user_id);

        $code = rand(100000, 999999);

        $registeredCode = User2FACode::where('user_id', $user_id)->first();

        $now = Carbon::now();
        if($registeredCode && $now->lte($registeredCode->expires)) {
            return true;
        }

        $code = User2FACode::updateOrCreate([
                'user_id' => $user_id,
            ],
            [
                'code' => $code,
                'expires' => Carbon::now()->addMinutes(15)
            ]
        );

        try {
            Mail::send(new sendCode2FA($user, $code));
            return true;
        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }
}
