@extends('layouts.app')

@section('content')

<div class="mx-auto w-full">
    <div>
        <!-- Card stats -->
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/3 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                <h5 class="text-gray-500 uppercase font-bold text-xs">
                                    Customers
                                </h5>
                                <span class="font-semibold text-xl text-gray-800">
                                    {{ $customer }}
                                </span>
                            </div>
                            <div class="relative w-auto px-2 flex-initial">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">
                            <span class="text-red-500 mr-2">
                                {{-- <i class="fas fa-arrow-down"></i> 3.48% --}}
                            </span>
                            <span class="whitespace-no-wrap">
                                Total Jumlah Customer
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                <h5 class="text-gray-500 uppercase font-bold text-xs">
                                    Stocks
                                </h5>
                                <span class="font-semibold text-xl text-gray-800">
                                    {{ $stock }}
                                </span>
                            </div>
                            <div class="relative w-auto px-2 flex-initial">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">
                            <span class="text-orange-500 mr-2">
                                {{-- <i class="fas fa-arrow-down"></i> 1.10% --}}
                            </span>
                            <span class="whitespace-no-wrap">
                                Total Jumlah Stock
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                <h5 class="text-gray-500 uppercase font-bold text-xs">
                                    Suppliers
                                </h5>
                                <span class="font-semibold text-xl text-gray-800">
                                    {{ $supplier }}
                                </span>
                            </div>
                            <div class="relative w-auto px-2 flex-initial">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-4">
                            <span class="text-green-500 mr-2">
                                {{-- <i class="fas fa-arrow-up"></i> 12% --}}
                            </span>
                            <span class="whitespace-no-wrap">
                                Total Jumlah Supplier
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-12">
    <h2 class="text-2xl font-medium">Stock</h2>
    <h5 class="text-gray-500 font-bold text-xs">
        Dengan Jumlah Kurang dari 50
    </h5>
    <div class="mt-4">
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        @include('component.thead',['head'=>[
                        'Id',
                        'Name',
                        'Kategori',
                        'Jumlah'
                        ]])
                        <tbody class="bg-white">
                            @foreach ($warning as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a class="text-red-600"
                                        href="{{ route('stock.edit',$item->id) }}">{{ Str::of($item->name)->title() }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ Str::of($item->category->name)->title() }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->amount }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection