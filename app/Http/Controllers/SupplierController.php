<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::whereStatus('AC')->latest()->paginate(15);


        return view('supplier.index')->with('supplier', $supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|unique:supplier,phone|numeric',
            'city' => 'required',
        ]);

        if ($validated) {
            $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->address = $request->address;
            $supplier->phone = $request->phone;
            $supplier->city = $request->city;
            $supplier->status = 'AC';
            $supplier->save();
            return redirect()->route('supplier.edit', $supplier->id)->with('message', $supplier->name . ' Sukses di buat');
        }

        return back()->withErrors($validated, 'login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);

        return view('supplier.edit')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);

        return view('supplier.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|numeric|unique:supplier,phone,' . $supplier->id,
            'city' => 'required',
        ]);

        if ($validated) {
            $supplier->name = $request->name;
            $supplier->address = $request->address;
            $supplier->phone = $request->phone;
            $supplier->city = $request->city;
            $supplier->status = 'AC';
            $supplier->save();
            return redirect()->route('supplier.edit', $supplier->id)->with('message', $supplier->name . ' Sukses di ubah');
        }

        return back()->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);

        $supplier->status = 'Na';
        $supplier->save();


        return back()->with('message', $supplier->name . ' Berhasil di hapus');
    }
}
