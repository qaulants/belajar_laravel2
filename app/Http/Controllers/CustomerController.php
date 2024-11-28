<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{

    public function index()
    {
        //select * from users
        $customers = Customer::get();
        $title = "Data Pelanggan";

        return view('pelanggan.index', compact('customers', 'title'));
        // compact untuk melempar data dari controller
    }

    public function create()
    {
        $title = 'Tambah Pelanggan';
        return view('pelanggan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
        // User::create([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password'=> Hash::make($request->password),
        // ]);
        Alert::success('Yesss', 'Data berhasil ditambah');
        return redirect()->to('customer'); //service => routing nya
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
        $title = "Edit Pelanggan";
        // select * from user where id = '$id'
        $customer = Customer::find($id);

        return view('pelanggan.edit', compact('title', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        Alert::success('yesss', 'Data berhasil ditambah');
        return redirect()->to('customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        // meminta ke halaman sebelumnya

        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $customer = Customer::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('DDDD', 'Delete');

        return redirect()->to('customer');
    }
}
