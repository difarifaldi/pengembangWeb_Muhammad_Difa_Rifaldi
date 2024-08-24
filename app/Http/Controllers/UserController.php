<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:8|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);


        $user->assignRole('mahasiswa');

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan akun baru');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {

            $validatedData = $request->validate([
                'username' => 'required|string|min:8|unique:users,username,' . $user->id,
                'password' => 'nullable|string|min:8',
            ]);


            $user->update([
                'username' => $validatedData['username'],
            ]);


            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($validatedData['password'])
                ]);
            }

            return redirect()->route('user.index')->with('success', 'Berhasil Ubah Data User.');
        } catch (\Exception $e) {

            dd($e->getMessage(), $e->getLine(), $e->getFile());
        }
    }

    public function destroy(User $user)
    {
        try {

            $user->delete();


            return response()->json(['success' => 'User berhasil dihapus.']);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Terjadi kesalahan saat menghapus user.'], 500);
        }
    }



    public function showLoginForm()
    {
        return view('login');
    }


    public function check_login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        return redirect()->route('login')->with('failed', 'Username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Kamu telah logout');
    }
}
