<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Hash;
Use Auth;
use App\Models\User;
use DB;

class UsersController extends Controller
{

public function register(Request $request){
    User::create([
        'name' => 'dwican',
        'email' => 'dwican@gmail.com',
        'password' => Hash::make('dwicandra')
    ]);
}


public function loginView(){
    return view('users');
}

public function home(){
    return view('home');
}

public function login(Request $request)
{
    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials)){
        return redirect('/home');
    }
    return redirect('/login');
}

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();  //hapus session
    $request->session()->regenerateToken(); //ngerefresh token

    return redirect('/login');
}



}