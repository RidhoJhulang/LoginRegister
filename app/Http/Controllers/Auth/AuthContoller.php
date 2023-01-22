<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;
use Exception;
use Illuminate\Validation\Rules\Password;

class AuthContoller extends Controller
{

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;

    public function showFormLogin() {
        if(Auth::check()) {
            return view('Dashboard');
        }
        return view('auth.Login');
    }

    public function showFormRegister() {
        return view('auth.Register');
    }

    public function login(Request $request) {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        try{

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard')->withSuccess('Signed in');
            }
    
        }catch(Exception $e){
            dd($e->getMessage());
        }
        
        return redirect('login')->withErrors('Login details are not valid');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'confirmed', Password::min(10)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        ]);
           
        $data = $request->all();
        $this->create($data);
         
        return redirect("login")->withSuccess('You have already to signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }  
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
