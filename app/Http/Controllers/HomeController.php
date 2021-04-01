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
        $totalStocks = Stock::whereStatus('AC')->count();
        $totalSuppliers = Supplier::whereStatus('AC')->count();

        return view('home')
            ->with('customer', $totalCustomers)
            ->with('supplier', $totalSuppliers)
            ->with('stock', $totalStocks);
    }
}
