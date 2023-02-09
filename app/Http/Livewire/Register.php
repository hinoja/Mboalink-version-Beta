<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
// use Laravolt\Avatar\Avatar; as Avatar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravolt\Avatar\Facade  as Avatar;
use WisdomDiala\Countrypkg\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;


class Register extends Component
{
    public $name, $password, $towns, $birthDay, $email, $townField;
    // public function constries(){
    //     $town=collection();
    // }
    // public function mount()
    // {
    //     $this->towns = collect();
    //     $countries = Country::all();
    //     $this->towns = $countries;
    // }
    public function resetInput()
    {
        $this->name = "";
        $this->password = "";
        // $this->towns = "";
        // $this->$birthDay="";
        $this->email = "";
    }
    public function signUp()
    {
        dd("ddd");
        $apiKey = "Q0b2xqmiV0Uya2ISFqPzG5yuNvcEUJ";
        $data = $this->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            // 'townField' => ['required', 'exists:countries,id'],
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
                'town' => $this->townField,
                'birthDay' => $data['birthDay'],
                'password' => Hash::make($data['password']),
            ]);
            $this->resetInput();
            // Auth::login($user);
            dd('eta1');
            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            session()->flash("success","You're registered successfuly,Verify your mailBox");
            // return view('welcome');
            return redirect()->to('/');
            //  Avatar::create($this->name)->save(storage_path('app/public/Avatar/avatar-' . $user->id . '.png', $quality = 90));
            //librairie sweet alert ou toast alert

        } else {
            //librairie sweet alert ou toast alert
            // alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');

            dd('eta');
            session()->flash("danger","You email Address don't exist ");
            return redirect()->to('/');
            // return  view('404');

            // dd('etap2');
        }
        // } catch (Exception $var) {
        //     return view('404');
        // }
    }
    public function render()
    {
        return view('livewire.register');
    }
}
