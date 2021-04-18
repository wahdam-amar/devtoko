<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson(Request $request)
    {

        $customer = Customer::whereStatus('AC')
            ->where("name", "LIKE", "%{$request->input('query')}%")->latest()->limit(5)->get();

        return response()->json(
            $customer,
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Customer::query();

        $query->when($request->filled('startdate'), function ($query) {
            $query->where('created_at', '>', request('startdate'));
        });

        $query->when($request->filled('enddate'), function ($query) {
            $query->where('created_at', '<', request('enddate'));
        });

        $customer = $query->whereStatus('AC')->latest()->paginate(15);

        return view('customer.index')->with('customer', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'phone' => 'required|unique:customer,phone|numeric',
            'city' => 'required',
        ]);

        if ($validated) {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->city = $request->city;
            $customer->status = 'AC';
            $customer->save();
            return redirect()->route('customer.edit', $customer->id)->with('message', $customer->name . ' Sukses di buat');
        }

        return back()->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::firstOrFail($customer->id);

        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|numeric|unique:customer,phone,' . $customer->id,
            'city' => 'required',
        ]);

        if ($validated) {
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->city = $request->city;
            $customer->status = 'AC';
            $customer->save();
            return redirect()->route('customer.edit', $customer->id)->with('message', $customer->name . ' Sukses di ubah');
        }

        return back()->withErrors($validated, 'login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::firstOrFail($customer->id);

        $customer->status = 'Na';
        $customer->save();


        return back()->with('message', $customer->name . ' Berhasil di hapus');
    }
}
