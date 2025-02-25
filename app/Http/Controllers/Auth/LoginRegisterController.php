<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{

    public function index(){
        $users = User::latest()->paginate(10);
        return view('admin.akun.index', compact('users'));
    }

    public function create(){
        return view('admin.akun.create');
    }

   

    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|string|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => "admin"
        ]);

        return redirect()->route('admin.akun')->withSuccess("Akun kamu berhasil dibuat");
    }

    public function edit(Request $request) {

        $akun = User::findOrFail($request->id);
        return view('admin.akun.edit', compact('akun'));
        
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required|string|max:250',
            'usertype' => 'required'
        ]);

        $akun = User::findOrFail($request->id);
        $akun->update([
            'name' => $request->name,
            'usertype' => $request->usertype
        ]);

        return redirect()->route('admin.akun')->withSuccess("Akun kamu berhasil diupdate");
    }

    public function updateEmail(Request $request) {

        $request->validate([
            'email' => 'required|string|max:250|unique:users',
        ]);

        $akun = User::findOrFail($request->id);
        $akun->update([
            'email' => $request->email
        ]);

        return redirect()->route('admin.akun')->withSuccess("Email kamu berhasil diupdate");
    }

    public function updatePassword(Request $request) {

        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $akun = User::findOrFail($request->id);
        $akun->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('admin.akun')->withSuccess("Password kamu berhasil diupdate");
    }
    
    public function destroy(Request $request) {

        $akun = User::findOrFail($request->id);
        $akun->delete();
        return redirect()->route('admin.akun')->withSuccess("Akun kamu berhasil dihapus");
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->user()->usertype == 'admin') {
                return redirect('admin/dashboard')->withSuccess("Kamu berhasil log in");
            }
        }

        return back()->withErrors([
            'email' => "Email kamu tidak terdaftar, silahkan coba lagi",
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess("Kamu berhasil logout");
    }
}

