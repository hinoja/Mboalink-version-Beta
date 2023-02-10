<?php

namespace App\Http\Controllers\api\front;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class registerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $apiKey = "Q0b2xqmiV0Uya2ISFqPzG5yuNvcEUJ";
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'townField' => ['required', 'exists:countries,id'],
            'birthDay' => ['required', 'date'],
            'password' => ['required', 'min:8'],
        ]);
        try {
            $reponse = Http::get('https://app.shakelist.io/api/1.0/check.php?apikey=' . $apiKey . '&email=' . $data['email'])->json();
            if ($reponse['result'] == "OK") {
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'town' => $data['townField'],
                    'birthDay' => $data['birthDay'],
                    'password' => Hash::make($data['password']),
                ]);
                return response()->json([
                    'status' => 1,
                    'User' => $user,
                    "message" => "You're registered successfuly,Verify your mailBox"
                ]);
                //  Avatar::create($this->name)->save(storage_path('app/public/Avatar/avatar-' . $user->id . '.png', $quality = 90));
            } else {
                return response()->json([
                    'status' => 0,
                    "message" => "Your email Address don't exist"
                ]);
            }
        } catch (Exception $var) {
            return response()->json([
                'status' => 0,
                "message" => "error connexion"
            ]);
        }
    }
}