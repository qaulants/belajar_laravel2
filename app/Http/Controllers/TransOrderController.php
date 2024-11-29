<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransOrderController extends Controller
{

    public function index()
    {
        //select * from
        $orders = Order::with('customer')->get();
        $title = "Data Transaksi";

        return view('order.index', compact('orders', 'title'));
        // compact untuk melempar data dari controller
    }

    public function create()
    {
        $title = 'Tambah Transaksi';
        $order = Order::get()->last();
        $id_order = $order->id ?? '';
        $id_order++;
        $order_code = "L".date('dmY').sprintf("%03s", $id_order);
        $customers = Customer::get();
        $services = Service::get();
        return view('order.create', compact('title', 'order_code', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        foreach ($request->id_paket as $key => $val){
            OrderDetail::create([
                'id_order' => $order->id,
                'id_service' =>  $request->id_paket[$key],
                'price_service' =>  $request->price_service[$key],
                'qty' => $request->qty[$key],
                'subtotal' => $request->subtotal[$key]
            ]);
        }
        // User::create([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password'=> Hash::make($request->password),
        // ]);
        Alert::success('Yee', 'Data berhasil ditambah');
        return redirect()->to('trans_order'); //service => routing nya
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // memakai service tidak pakai s karena hanya ingin mengambil satu data
        $title = "Edit Paket Laundry";
        // select * from user where id = '$id'
        $service = Service::find($id);

        return view('paket.edit', compact('title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();

        Alert::success('yesss', 'Data berhasil ditambah');
        return redirect()->to('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $service = Service::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('DDDD', 'Delete');

        return redirect()->to('service');
    }

    public function delete($id)
    {
        $service = Service::find($id)->delete();
        // meminta ke halaman sebelumnya

        return redirect()->to('service');
    }

    public function getPaket($id_paket)
    {
        // ini cara 1
        $paket = Service::where('id', $id_paket)->first();
        // ini cara 2
        // $paket = service::find($id_paket);
        return response()->json($paket);
    }
}
