@extends('layout.app')
@section('content')
    <div class="card">
        <h3 class="card-header">{{$title ?? ''}}</h3>
        <div class="card-body">
           <form action="{{route('trans_order.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                    <div class="mb-3">
                            <label for="">No Transaksi</label>
                            <input type="text" name="order_code" class="form-control" value="{{$order_code ?? ''}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Tgl Laundry</label>
                            <input type="date" name="order_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">Nama Pelanggan</label>
                            <select name="id_customer" id="" class="form-control">
                                <option value="">--Pilih Pelanggan--</option>
                                @foreach ($customers as $cus)
                                    <option value="{{$cus->id}}">{{$cus->customer_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Tgl Pengembalian</label>
                            <input type="date" name="order_end_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div align="right" class="mb-3">
                    <button type="button" class="btn btn-secondary add-row" id="add-row">Tambah Baris</button>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-parent">
                            <tr>
                                {{-- <td></td>
                                <td></td>
                                <td></td>
                                <td></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>


                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
           </form>
        </div>
    </div>
@endsection
