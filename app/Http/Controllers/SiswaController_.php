<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
       // $data = Siswa::all();
       $data = siswa::orderBy('nomor_induk', 'asc')->paginate(1);
        return view('Siswa/index')->with('data',$data);
    }
    

    public function detail($id){
        // return "<h1>Saya Siswa dari Controller dengan Id $id</h1>";
        $data = siswa::where('nomor_induk',$id)->first();
        return view('Siswa/show')->with('data', $data);
    }
    function create(){

    }
    function delete(){
        
    }
}
