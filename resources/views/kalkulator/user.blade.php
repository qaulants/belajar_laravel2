@extends('kalkulator.index')
@section('content')

<h1>Data Pengguna</h1>
<a style="text-decoration: none;" class="btn btn-primary" href="{{route('user.create')}}">Tambah User</a>
<table width="90%" class="table table-bordered border-dark mt-3">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('user.edit', $user->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{route('user.destroy', $user->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border: none; background: none; color: red;" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>


@endsection