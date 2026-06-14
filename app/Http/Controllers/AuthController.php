<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Melakukan validasi terhadap data yang dikirimkan pengguna
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Jika gagal mengambil data 'email' dan 'password'
        if (!auth()->attempt($validated)) {
            // Menampilkan message 'Invalid Credentials'
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        // Membuat token digital baru sebagai "kunci akses resmi" setelah pengguna berhasil masuk (login)
        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        // Menampilkan token yang telah dibuat sebelumnya
        return response()->json(['message' => 'User registered successfully', 'access_toke' => $token]);
    }

    public function register(Request $request)
    {
        // Melakukan validasi terhadap data yang dikirimkan pengguna
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        // Menyimpan data pengguna (user) ke dalam database
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            // Hash => mengacak dan mengamankan kata sandi (password) pengguna sebelum disimpan ke dalam basis data (database)
            'password' => Hash::make($validated['password']),
        ]);

        // Membuat token digital baru sebagai "kunci akses resmi" setelah pengguna berhasil masuk (login)
        $token = $user->createToken('auth_token')->plainTextToken;

        // Menampilkan token yang telah dibuat sebelumnya
        return response()->json(['message' => 'User registered successfully', 'access_toke' => $token]);
    }
}
