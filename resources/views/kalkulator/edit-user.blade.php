@extends('kalkulator.index')
@section('content')
    <h1>{{$title ?? ''}}</h1>

    <form action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        @method('put')
        <label for="">Nama</label>
        <input type="text" name="name" value="{{$user->name ?? ''}}" placeholder="Masukkan nama Anda">
        <br>
        <label for="">Email</label>
        <input type="email" name="email" value="{{$user->email ?? ''}}" placeholder="Masukkan email Anda">
        <br>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Masukkan password Anda">
        <br>
        <button>Simpan</button>
    </form>
@endsection
