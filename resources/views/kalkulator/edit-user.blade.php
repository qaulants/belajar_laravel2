@extends('kalkulator.index')
@section('content')
    <h1>{{$title ?? ''}}</h1>

    <form action="{{route('user.update', $user->id)}}" method="post">
        @csrf
        @method('put')
        <label for="" class="form-label">Nama</label>
        <input type="text" class="form-control w-50" name="name" value="{{$user->name ?? ''}}" placeholder="Masukkan nama Anda">
        <br>
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control w-50" name="email" value="{{$user->email ?? ''}}" placeholder="Masukkan email Anda">
        <br>
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control w-50" name="password" placeholder="Masukkan password Anda">
        <br>
        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
