@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{$title ?? ''}}</h3>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{route('trans_order.create')}}" class="btn btn-primary">
                    Tambah
                </a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key =>$val)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$val->customer->customer_name}}</td>
                        <td>{{$val->order_code}}</td>
                        <td>{{$val->order_date}}</td>
                        <td>{{$val->order_end_date}}</td>
                        <td>{{$val->order_status}}</td>
                        <td>
                            <a href="{{route('trans_order.edit', $val->id)}}" class="btn btn-icon btn-secondary">
                                <i class="tf-icons bx bx-show bx-22px"></i>
                            </a>
                            <a href="">
                                <form action="{{route('customer.destroy', $val->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-icon btn-danger">
                                        <i class="tf-icons bx bx-trash bx-22px"></i>
                                    </button>
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
