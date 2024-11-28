@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">Tambah Paket</h3>
        <div class="card-body">
           <form action="{{route('service.store')}}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="">Nama Paket</label>
                    <input type="text" name="service_name" class="form-control" placeholder="Nama paket">
                </div>
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input type="number" name="price" class="form-control" placeholder="Harga">
                </div>
                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <input type="text" name="description" class="form-control" placeholder="Deskripsi">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
