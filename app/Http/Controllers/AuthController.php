<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'email.required' => 'email harus diisi!',
            'email.email' => 'Format email harus benar',
            'password.required' => 'Password harus diisi!',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            toast('email tidak ditemukan', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            toast('Password salah', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        alert()->success('Berhasil Login', 'Selamat datang di MemberBalance');

        // Arahkan sesuai role_id
        if ($user->role_id == 3) {
            return redirect()->intended('dashboardpinjam');
        }

        return redirect()->intended('dashboard');
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
