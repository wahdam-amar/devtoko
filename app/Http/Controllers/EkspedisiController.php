<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekspedisi = Ekspedisi::whereStatus('AC')->latest()->paginate(15);


        return view('ekspedisi.index')->with('ekspedisi', $ekspedisi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekspedisi.create');
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
        ]);

        if ($validated) {
            $ekspedisi = new Ekspedisi;
            $ekspedisi->name = $request->name;
            $ekspedisi->status = 'AC';
            $ekspedisi->save();
            return redirect()->route('ekspedisi.edit', $ekspedisi->id)->with('message', $ekspedisi->name . ' Sukses di buat');
        }

        return back()->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekspedisi  $ekspedisi
     * @return \Illuminate\Http\Response
     */
    public function show(Ekspedisi $ekspedisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekspedisi  $ekspedisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekspedisi $ekspedisi)
    {
        $ekspedisi = Ekspedisi::findOrFail($ekspedisi->id);

        return view('ekspedisi.edit')->with('ekspedisi', $ekspedisi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekspedisi  $ekspedisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekspedisi $ekspedisi)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        if ($validated) {
            $ekspedisi->name = $request->name;
            $ekspedisi->status = 'AC';
            $ekspedisi->save();
            return redirect()->route('ekspedisi.edit', $ekspedisi->id)->with('message', $ekspedisi->name . ' Sukses di ubah');
        }

        return back()->withErrors($validated, 'login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekspedisi  $ekspedisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekspedisi $ekspedisi)
    {
        $ekspedisi = Ekspedisi::findOrFail($ekspedisi->id);

        $ekspedisi->status = 'Na';
        $ekspedisi->save();


        return back()->with('message', $ekspedisi->name . ' Berhasil di hapus');
    }
}
