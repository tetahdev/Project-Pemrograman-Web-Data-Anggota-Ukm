<?php

namespace App\Http\Controllers; // lokasi controller

use Illuminate\Http\Request; // ambil data dari form
use Illuminate\Support\Facades\Hash; // biasanya dipakai untuk enkripsi password
use Illuminate\Support\Facades\Session; // untuk simpan data user di session
use App\Models\User; // model User untuk akses tabel users

class LoginController extends Controller
{
    // tampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // proses login user
    public function login(Request $request)
    {
        $request -> validate( [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request -> email) -> first();

        if ($user && $request -> password === $user -> password) {
            Session::put('user_id', $user -> id);
            Session::put('user_name', $user -> name);

            return redirect() -> route('dashboard');

        }

        return back() -> withErrors([
                'email' => 'Email atau password salah'
        ]) -> withInput();
    }

    // logout user
    public function logout()
    {
        Session::flush();
        return redirect() -> route('login');
    }
}
