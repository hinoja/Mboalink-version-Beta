<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class updatePasswordController extends Controller
{

    public function showFormUpdate($token)
    {
        return view('ResetPasswordPage', ['token' => $token]);
    }
    public function updating(Request $request)
    {
        $data = $request->validate([
            // 'password_old'=>['min:8','required'],
            'email' => ['email', 'required', 'string', 'exists:users'],
            'password' => ['min:8', 'confirmed', 'string', 'required'],
            'password_confirmation' => ['required']
        ]);
        $password_reset_request = DB::table('password_resets')->where([
            'token' => $request->token,
            'email' => $data['email']
        ])->first();

        // dd($password_reset_request);
        if (!$password_reset_request) {
            return back()->with('danger', 'Invalid Token');
        }
        // else {
        // $user= User::where('email', $password_reset_request->email)->first();
        // $user->password=Hash::make($data['password']);
        // $user->save();
        User::where('email', $password_reset_request->email)->update([
            'password' => Hash::make($data['password'])
        ]);
        DB::table('password_resets')->where('email', $request->email)->delete();
        return redirect()->route('login')->with('success', 'Mot de Passe Modifié');
        // }
    }
}
