<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function account()
    {
        return view('auth.account');
    }
    public function changePasswordForm()
    {
        return view('auth.changePassword');
    }
    public function register(Request $request)
    {
        $uid = mt_rand(1000, 9999);
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => 'required|min:10',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user = [
            'user_id' => $uid,
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_role' => 1
        ];
        DB::table('users')->insert($user);
        return redirect('/login');
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($fields)) 
        {
            $request->session()->regenerate();
            return redirect()->route('account');
        }
        return back();
    }
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);
        $uid = auth()->user()->user_id;
        DB::table('users')->where('user_id', $uid)->update(
            ['password' => bcrypt($request->new_password)]
        );
        auth()->logout();
        return redirect()->route('login');
    }
}
