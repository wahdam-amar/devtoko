@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow mt-4">
    <h2 class="text-2xl font-medium">Stock</h2>
    <div class="mt-4">

        @include('component.error')

        @include('component.alert')
        <form method="post" action="{{ route('stock.store') }}">
            @csrf

            <div class="flex flex-wrap overflow-hidden md:-mx-6">

                <div class="md:flex-1 w-full overflow-hidden md:my-6 md:px-6 md:w-1/3">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Nama</label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input name="name" type="text" placeholder="Nama"
                            class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                </div>

                <div class="md:flex-1 w-full overflow-hidden md:my-6 md:px-6 md:w-1/3">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">
                        Keterangan
                    </label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input placeholder="Keterangan" name="desc" type="text"
                            class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                </div>

            </div>

            <div class="flex flex-wrap overflow-hidden md:-mx-6">

                <div class="w-full overflow-hidden md:my-6 md:px-6 md:w-1/4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Kategori</label>
                    <select name="category_id" class=" h-10 mt-2 form-select w-full">
                        @forelse ($category as $item)
                        <option value="{{ $item->id }}">{{ Str::title($item->name) }}</option>
                        @empty
                        <option value="1">Belum Ada Katagori</option>
                        @endforelse
                    </select>
                </div>

                <div class="w-full overflow-hidden md:my-6 md:px-6 md:w-1/4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Harga
                        Jual</label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input name="price_sell" type="number" placeholder="Harga Jual"
                            class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                </div>

                <div class="w-full overflow-hidden md:my-6 md:px-6 md:w-1/4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Harga
                        Beli</label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input name="price_buy" type="number" placeholder="Harga Beli"
                            class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                </div>

                <div class="w-full overflow-hidden md:my-6 md:px-6 md:w-1/4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Jumlah</label>
                    <div class=" my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input name="amount" type="number" placeholder="Harga Beli"
                            class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                    </div>
                </div>

            </div>

            <button type="submit"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">Save
            </button>
            @include('component.BackButton')
        </form>


    </div>
</div>
@endsection