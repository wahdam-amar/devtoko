<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {

        $invoices = Invoice::with('customer')->whereStatus('AC')->latest()->paginate(15);

        return view('invoice.index')->with('invoices', $invoices);
    }
}
