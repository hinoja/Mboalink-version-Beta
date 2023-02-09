<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    public function SignIn()
    {
        dd("test");
        $data = $this->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);
    }
    public function render()
    {
        return view('livewire.login');
    }
}
