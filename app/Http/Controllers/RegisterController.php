<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
// use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Notifications\WelcomeNotification;
use WisdomDiala\Countrypkg\Models\Country;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    /**
     *display Registerview
     */
    public function page()
    {
        $countries = Country::all();
        return view('registerPage', ['towns' => $countries]);
    }
    /**
     * store User data
     */
    public function store(Request $request)
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
                Auth::login($user);
                // activity()->log('Look mum, I logged something');
                activity('Register')
                    ->by($user)
                    // ->performedOn('App\Models\User'::class)
                    // ->causedBy($user)
                    // ->withProperties(['customProperty' => 'customValue'])
                    ->log('Register, I Registered something');
                Notification::send($user, new WelcomeNotification($user));
                return redirect()->route('post.view')->with("success", "You had registered successfuly,Verify your mailBox");
                //  Avatar::create($this->name)->save(storage_path('app/public/Avatar/avatar-' . $user->id . '.png', $quality = 90));
            } else {
                return redirect()->back()->with("danger", "You email Address don't exist ");
            }
        } catch (Exception $var) {
            return view('404');
        }
    }
}
