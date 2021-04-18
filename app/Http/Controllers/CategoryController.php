<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Category::query();

        $query->when($request->filled('startdate'), function ($query) {
            $query->where('created_at', '>', request('startdate'));
        });

        $query->when($request->filled('enddate'), function ($query) {
            $query->where('created_at', '<', request('enddate'));
        });

        $category = $query->whereStatus('AC')->latest()->paginate(15);

        return view('category.index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required|max:255|unique:stock_category,name'
        ]);

        if (!$validated) {
            return back()->withErrors($validated);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->status = 'AC';
        $category->save();

        return back()->with('message', $category->name . ' Sukses di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:stock_category,name,' . $category->id
        ]);

        if (!$validated) {
            return back()->withErrors($validated);
        }

        $category->name = $request->name;
        $category->save();

        return back()->with('message', $category->name . ' Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->status = 'NA';
        $category->save();


        return back()->with('message', $category->name . ' Berhasil di hapus');
    }
}
