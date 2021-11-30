<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Events\LoginHistory;

class UserController extends Controller
{
    public function displayLoginForm(){
        return view('loginform');
    }

    public function displayRegisterForm(){
        return view('registerform');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages(['email' => 'No such user found']);
        }

        if ($user->password != $request->password) {
            throw ValidationException::withMessages(['password' => 'Incorrect password']);
        }

        $request->session()->put('id', $user->id);

        event(new LoginHistory($user));

        return redirect('/contacts');
    }

    public function logout(Request $request){
        $request->session()->forget('id');
        return redirect('/loginform');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|size:8'
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return $this->login($request);
    }
}
