@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">Edit Pengguna</h3>
        <div class="card-body">
           <form action="{{route('user.update', $user->id)}}" method="post">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input value="{{$user->email}}" type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
