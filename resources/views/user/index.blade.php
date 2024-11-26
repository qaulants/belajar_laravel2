@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">Data Pengguna</h3>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{route('user.create')}}" class="btn btn-primary">
                    Tambah
                </a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key =>$val)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{$val->email}}</td>
                        <td>
                            <a href="{{route('user.edit', $val->id)}}" class="btn btn-icon btn-secondary">
                                <i class="tf-icons bx bx-pencil bx-22px"></i>
                            </a>
                            <a href="">
                                <form action="{{route('user.destroy', $val->id)}}" method="post" class="d-inline">
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
