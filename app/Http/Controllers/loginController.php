<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // dd('test');
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        $password = $data['password'];
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            // dd('etape');
            if (Hash::check($password, $user->password)) {
            // dd('1etape');

                Auth::login($user);
                return redirect()->back()->with("success", "Hello " . $user->name);
            } else
            dd('2etape');

                return redirect()->back()->with("danger", "Verify yours accreditials ");
        }else{
                // dd('Etap2');
            return redirect()->back()->with("danger", "This User is not exist here ");
        }

    }
}
