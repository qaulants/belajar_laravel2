@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{$title ?? ''}}</h3>
        <div class="card-body">
           <form action="{{route('service.update', $service->id)}}" method="post">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="">Nama Paket</label>
                    <input value="{{$service->service_name}}" type="text" name="service_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input value="{{$service->price}}" type="number" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <input value="{{$service->description}}" type="text" name="description" class="form-control" placeholder="">
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
