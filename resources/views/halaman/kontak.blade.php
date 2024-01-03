@extends('layout/aplikasi')
@section('konten')
<h1>{{ $judul }}</h1>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
Laboriosam magni iure omnis quae nobis, in vitae error nisi earum quas?</p>
<p>
    <ul>
        <li>Email: {{ $kontak['email']}}</li>
        <li>Youtube: {{ $kontak['youtube']}}</li>
    </ul>
</p>
@endsection