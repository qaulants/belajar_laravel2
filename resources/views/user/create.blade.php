@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">Tambah Pengguna</h3>
        <div class="card-body">
           <form action="{{route('user.store')}}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
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
