@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h2 class="mb-2 text-2xl font-medium">{{ $customer->name }}</h2>

    {{-- <a href="{{ route('customer.create') }}"
    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">New
    </a> --}}

    @include('component.datePicker')

    <div class="mt-4">

        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div
                    class="mb-6 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="table-auto md:w-full">
                        @include('component.thead',['head'=>[
                        'Id',
                        'Name',
                        'Date',
                        'Due',
                        'Amount',
                        'Action',
                        ]])
                        <tbody class="bg-white">
                            @foreach ($invoice as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->no }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->customer->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->date->format('d-m-yy') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->due->format('d-m-yy') }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->amount }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- pagination link --}}
                {{ $invoice->withQueryString()->links() }}
            </div>
        </div>
    </div>

</div>

@endsection