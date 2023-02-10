<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token =  $user->createToken('auth_token')->plainTextToken;
                Auth::login($user);
                return response()->json([
                    "Staus" => "1",
                    "message" => "Hello ".$user->name,
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    "Staus" => "0",
                    "info" => "Your accreditials are incorrect,retry"
                ]);
            }
        } else {
            return response()->json([
                "Staus" => "0",
                "info" => "This User don't exist in our database"
            ]);
        }
    }
}
