<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa = Jasa::whereStatus('AC')->paginate(15);

        return view('jasa.index')->with('jasa', $jasa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.create');
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
            'price' => 'required|numeric',
        ]);

        if ($validated) {
            $jasa = new Jasa;
            $jasa->name = $request->name;
            $jasa->price = $request->price;
            $jasa->status = 'AC';
            $jasa->save();
            return redirect()->route('jasa.edit', $jasa->id)->with('message', $jasa->name . ' Sukses di buat');
        }

        return back()->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        $jasa = Jasa::findOrFail($jasa->id);

        return view('jasa.edit')->with('jasa', $jasa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        $jasa = Jasa::findOrFail($jasa->id);

        return view('jasa.edit')->with('jasa', $jasa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jasa $jasa)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        if ($validated) {
            $jasa->name = $request->name;
            $jasa->price = $request->price;
            $jasa->status = 'AC';
            $jasa->save();
            return redirect()->route('jasa.edit', $jasa->id)->with('message', ucfirst($jasa->name) . ' Sukses di buat');
        }

        return back()->withErrors($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        $jasa = Jasa::findOrFail($jasa->id);

        $jasa->status = 'Na';
        $jasa->save();


        return back()->with('message', $jasa->name . ' Berhasil di hapus');
    }
}
