<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('layouts.login', [
            'title' => 'Login'
        ]);
    }

    public function register(){
        return view('layouts.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $user = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:100',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ]);
        // dd('Registrasi Berhasil');
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        return redirect('/')->with('success', 'Registrasi Berhasil!! Silahkan Login');
    }

    public function login(Request $request){
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // dd('berhasil');
        if(Auth::attempt($kredensial)){
            $request->session()->regenerate();
            return redirect()->intended('/dataobat');
        }

        return back()->with('loginError', 'Email dan Password Tidak Sesuai');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function datausers(){
        $user = User::orderBy('id', 'DESC')->get();
        return view('users.datausers',compact('user'), [
            "title" => "Users"
        ]);
    }

    public function tambahUsers(){
        return view('users.tambahusers',[
            "title" => "Tambah Users"
        ]);
    }

    public function storeuser(Request $request){
        $user = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:100',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ]);
        // dd('Registrasi Berhasil');
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        return redirect('/datausers')->with('success', 'Registrasi Berhasil!!');
    }

    public function deleteuser($id){
        $user = User::find($id);
        $user->delete($user->id);
        return redirect('/datausers')->with('delete', 'Data User Berhasil dihapus!!');
    }
}
