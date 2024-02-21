<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registrasi(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'email' => 'required|unique:users,email'
        ], [
            'name.required' => 'Nama pengguna harus diisi',
            'username.required' => 'Username pengguna harus diisi.',
            'username.unique' => 'Username pengguna sudah digunakan.',
            'password.required' => 'Kata sandi harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email harus valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
        ]);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->slug = $validatedData['username'] . time();
        $user->email = $validatedData['email'];
        $user->role = 'pengguna';
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Pengguna berhasil didaftarkan',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return response()->json([
                    'message' => 'Login berhasil sebagai admin',
                    'role' => $user->role,
                    'user' => $user,
                    'token' => $user->createToken('falzaStore')->plainTextToken
                ]);
            } else {
                return response()->json([
                    'message' => 'Login berhasil sebagai pengguna',
                    'role' => $user->role,
                    'user' => $user,
                    'token' => $user->createToken('falzaStore')->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Username atau password salah.'
            ], 401);
        }
    }
}
