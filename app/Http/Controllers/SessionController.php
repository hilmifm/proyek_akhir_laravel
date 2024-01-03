<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view("sesi/index");
    }
    function login(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi'
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('Siswa')->with('success','Berhasil login');
        } else{
           return redirect('sesi')->withErrors('Username dan password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');
    }

    function register(){
        return view('sesi/register');
    }
    function create(Request $request){
            Session::flash('name', $request->name);
            Session::flash('email', $request->email);
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6'
            ],[
                'name.required'=>'Nama Wajib diisi',
                'email.required'=>'Email Wajib diisi',
                'email.email' => 'Silahkan masukkan email yang valid',
                'email.unique' => 'Email sudah pernah digunakan, silahkan pilih email yang lain',
                'password.required'=> 'Password Wajib diisi',
                'password.min'=> 'Minimum password adalah 6 karakter'
            ]);

            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ];
            User::create($data);
    
            $infologin = [
                'email'=> $request->email,
                'password'=> $request->password
            ];
    
            if (Auth::attempt($infologin)) {
                return redirect('Siswa')->with('success', Auth::user()->name . 'Berhasil login');
            } else{
               return redirect('sesi')->withErrors('Username dan password tidak valid');
        }
    }
}

