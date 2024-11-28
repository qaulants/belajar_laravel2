@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{$title ?? ''}}</h3>
        <div class="card-body">
           <form action="{{route('customer.store')}}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Nama paket">
                </div>
                <div class="mb-3">
                    <label for="">Nomor HP</label>
                    <input type="number" name="phone" class="form-control" placeholder="No hp">
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="alamat">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
