<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalCustomers = Customer::whereStatus('AC')->count();

        $Stocks = Stock::whereStatus('AC');

        $totalStocks = $Stocks->count();

        $warningStocks = $Stocks->with('category')->where('amount', '<', 50)->get();

        $totalSuppliers = Supplier::whereStatus('AC')->count();

        return view('home')
            ->with('customer', $totalCustomers)
            ->with('supplier', $totalSuppliers)
            ->with('stock', $totalStocks)
            ->with('warning', $warningStocks);
    }
}
