<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{

    public function index()
    {
        //select * from users
        $services = Service::get();
        $title = "Data Paket Laundry";

        return view('paket.index', compact('services', 'title'));
        // compact untuk melempar data dari controller
    }

    public function create()
    {
        $title = 'Tambah Paket Laundry';
        return view('paket.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::create($request->all());
        // User::create([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password'=> Hash::make($request->password),
        // ]);
        Alert::success('Yee', 'Data berhasil ditambah');
        return redirect()->to('service'); //service => routing nya
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

    public function delete($id)
    {
        $service = Service::find($id)->delete();
        // meminta ke halaman sebelumnya

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
}
