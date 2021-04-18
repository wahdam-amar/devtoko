@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow mt-4">
    <h2 class="text-2xl font-medium">Supplier</h2>
    <div class="mt-4">

        <form method="POST" action="{{ route('supplier.update',$supplier->id) }}">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <label class="block">
                    <span class="text-gray-700">Name</span>
                    <input name="name"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" value="{{ $supplier->name }}">
                </label>
                <label class="block">
                    <span class="text-gray-700">Address</span>
                    <input name="address"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" value="{{ $supplier->address }}">
                </label>
                <label class="block">
                    <span class="text-gray-700">City</span>
                    <input name="city"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" value="{{ $supplier->city }}">
                </label>
                <label class="block">
                    <span class="text-gray-700">Phone</span>
                    <input name="phone"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" value="{{ $supplier->phone }}">
                </label>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">Edit
            </button>
            @include('component.BackButton')
        </form>
    </div>
</div>
@endsection