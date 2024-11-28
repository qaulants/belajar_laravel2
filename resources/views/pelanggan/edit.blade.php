@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{$title ?? ''}}</h3>
        <div class="card-body">
           <form action="{{route('customer.update', $customer->id)}}" method="post">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="">Nama Pelanggan</label>
                    <input value="{{$customer->customer_name}}" type="text" name="customer_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Nomor HP</label>
                    <input value="{{$customer->phone}}" type="number" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input value="{{$customer->address}}" type="text" name="address" class="form-control" placeholder="">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
