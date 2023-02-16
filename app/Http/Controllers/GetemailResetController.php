<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;

class GetemailResetController extends Controller
{
    public function recovery(Request $request)
    {
        $data =  $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email']
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $data['email'],
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $user=User::where('email',$data['email'])->first();
        // Mail::send('','');
        Notification::send($user, new ResetPasswordNotification($token));
        // Notification::send($data['email'], new ResetPasswordNotification($token));
        //   Notification::send($data['email'], ResetPasswordNotification::class);
        // dd('test');
        return back()->with('success', 'Your have received a email on your mailBox,Please verify');
    }
}
