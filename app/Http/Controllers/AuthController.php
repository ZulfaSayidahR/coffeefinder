<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // =========================
    // LOGIN PAGE
    // =========================
    public function showLogin()
    {
        return view('auth.login');
    }

    // =========================
    // LOGIN PROCESS
    // =========================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/home');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // =========================
    // REGISTER PAGE
    // =========================
    public function showRegister()
    {
        return view('auth.register');
    }

    // =========================
    // REGISTER PROCESS
    // =========================
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,

            // HASH PASSWORD
            'password' => Hash::make($request->password),

            'role' => 'user'
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil, silakan login!');
    }

    // =========================
    // FORGOT PASSWORD PAGE
    // =========================
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // =========================
    // CHECK EMAIL
    // =========================
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        return redirect('/reset-password/' . $user->id);
    }

    // =========================
    // RESET PASSWORD PAGE
    // =========================
    public function showResetPassword($id)
    {
        $user = User::findOrFail($id);

        return view('auth.reset-password', compact('user'));
    }

    // proses reset password
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:5|confirmed'
        ]);

        $user = User::findOrFail($id);

        // JANGAN HASH LAGI
        $user->password = $request->password;

        $user->save();

        return redirect('/login')
            ->with('success', 'Password berhasil diubah');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}