<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexRegister()
    {
        return view('pages.sign-up',  [
            'title' => 'Register'
        ]);
    }

    public function indexLogin()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            }
        } else {
            return view('pages.sign-in', [
                'title' => 'Login'
            ]);
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        $nama = $validated['name'];
        $email = $validated['email'];
        $password = bcrypt($validated['password']);

        $user = new User();
        $user->name = $nama;
        $user->email = $email;
        $user->password = $password;
        $user->role = "admin";
        $user->save();

        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($inputan)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }

    public function login(Request $request)
    {
        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $level = User::where('email', $inputan['email'])->value('role');

        if ($level == 'admin') {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            return back()->with('errorLogin', 'Login Gagal !');
        } else {
            return back()->with('errorLogin', 'Login Gagal !');
        }

        return back()->with('errorLogin', 'Login Gagal !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
