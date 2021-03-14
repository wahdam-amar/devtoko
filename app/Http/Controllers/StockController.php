<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // \Illuminate\Support\Facades\DB::enableQueryLog();

        $Stocks = Stock::with('category')->whereStatus('AC')->latest('id')->paginate(15);

        // dd(\Illuminate\Support\Facades\DB::getQueryLog());
        return view('stock.index')->with('stocks', $Stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
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
            'price_sell' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        if ($validated) {
            $stock = new Stock;
            $stock->name = $request->name;
            $stock->desc = $request->desc;
            $stock->price_buy = $request->price_buy;
            $stock->price_sell = $request->price_sell;
            $stock->status = 'AC';
            $stock->amount = 0;
            $stock->category_id = $request->category_id;
            $stock->save();
            // return redirect()->route('stock.edit', $stock->id)->with('message', $stock->name . ' Sukses di buat');
            return back()->with('message', $stock->name . ' Sukses di buat');
        }

        return back()->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
