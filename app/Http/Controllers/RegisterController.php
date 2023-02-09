<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use WisdomDiala\Countrypkg\Models\Country;

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
        // dd("ddd");
        $apiKey = "Q0b2xqmiV0Uya2ISFqPzG5yuNvcEUJ";
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'townField' => ['required', 'exists:countries,id'],
            'birthDay' => ['required', 'date'],
            'password' => ['required', 'min:8'],
        ]);
        // dd($data);
        // try {
        $reponse = Http::get('https://app.shakelist.io/api/1.0/check.php?apikey=' . $apiKey . '&email=' . $data['email'])->json();
        if ($reponse['result'] == "OK") {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'town' => $data['townField'],
                'birthDay' => $data['birthDay'],
                'password' => Hash::make($data['password']),
            ]);
            // $this->resetInput();
            // Auth::login($user);
            // dd('eta1');
            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            // session()->flash("success", "You're registered successfuly,Verify your mailBox");
            // return view('welcome');
            return redirect()->back()->with("success", "You're registered successfuly,Verify your mailBox");
            //  Avatar::create($this->name)->save(storage_path('app/public/Avatar/avatar-' . $user->id . '.png', $quality = 90));
            //librairie sweet alert ou toast alert

        } else {
            //librairie sweet alert ou toast alert
            // alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');

            // dd('eta2');
            // session()->flash("danger", "You email Address don't exist ");
            return redirect()->back()->with("danger","You email Address don't exist ");
            // return  view('404');

            // dd('etap2');
        }
        // } catch (Exception $var) {
        //     return view('404');
        // }

    }
}
