<?php

namespace App\Http\Controllers;

use App\Models\User;  //User: Model untuk menyimpan data user ke databas
use Illuminate\Http\Request; //Request: Untuk menangani data dari form.
use Illuminate\Support\Facades\Auth;  //Auth: Fitur autentifikasi login dan logout Laravel.
use Illuminate\Support\Facades\Hash; //Untuk mengenkripsi password.
use Illuminate\Support\Facades\Cookie; //Cookie: Untuk menyimpan pesan ke browser

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    // Menampilkan halaman register (resources/views/register.blade.php).Biasanya berisi form isian untuk daftar user baru.

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required', //name wajib diisi.
            'email' => 'required|email|unique:users', //email wajib, format email, dan belum ada di tabel users.
            'hp' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'password' => 'required|confirmed|min:6', //password wajib, minimal 6 karakter, dan harus sama dengan password_confirmation.
            'role' => 'required|in:user,admin'
        ]);  //role hanya boleh user atau admin.

        // Menyimpan data user ke database, dengan password yang sudah dienkripsi pakai Hash.
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Tambahkan cookie Menyimpan cookie sementara (1 menit) berisi pesan sukses.
        Cookie::queue('register_success', 'Registrasi berhasil! Silakan login.', 1);

        //Setelah berhasil register, redirect ke halaman login. 
        return redirect()->route('login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard.index'); //Jika login gagal, arahkan kembali ke form login dengan pesan error:
            } else {
                return redirect()->route('dashboard.user');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
