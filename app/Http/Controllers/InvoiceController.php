<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Stock;
use App\Models\Company;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::query();

        $query->when($request->filled('startdate'), function ($query) {
            $query->where('created_at', '>', request('startdate'));
        });

        $query->when($request->filled('enddate'), function ($query) {
            $query->where('created_at', '<', request('enddate'));
        });

        $invoices = $query->with('customer')->whereStatus('AC')->latest()->paginate(15);

        return view('invoice.index')->with('invoices', $invoices);
    }

    public function create()
    {

        $company = Company::find(1)->first();

        return view('stock.transaction')->with('company', $company);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required|date',
            'duedate' => 'required|date',
            'customer' => 'required',
            'details' => 'required',
        ]);

        // dd($request->all());

        // throw new StockMinusException('ke isi kah');

        //Parse array dari input
        $stocks = json_decode($request->details, true);
        // dd($request->all());


        // Buar headernya
        $invoice = new Invoice();
        // $invoice->no = $request->header;
        $invoice->date = $request->date;
        $invoice->due = $request->duedate;
        $invoice->customer_id = $request->customer;
        $invoice->amount = $request->amount ?? 100;
        $invoice->save();

        // loop lalu insert ke detail
        foreach ($stocks as $stock) {
            $detail = new InvoiceDetail();
            $detail->invoice_no = $invoice->no;
            $detail->stock_id = $stock['id'];
            $detail->quantity = $stock['qty'];
            $detail->save();
            // var_dump($stock['id']);
        }

        return back()->with('message', $invoice->no . ' Sukses di buat');
    }
}
