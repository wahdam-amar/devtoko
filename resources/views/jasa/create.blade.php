@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow mt-4">
    <h2 class="text-2xl font-medium">Jasa</h2>
    <div class="mt-4">

        <form method="post" action="{{ route('jasa.store') }}">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                @csrf
                <label class="block">
                    <span class="text-gray-700">Name</span>
                    <input name="name"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" placeholder="">
                </label>
                <label class="block">
                    <span class="text-gray-700">Price</span>
                    <input name="price"
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" placeholder="">
                </label>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">Save
            </button>
            @include('component.BackButton')
        </form>
    </div>
</div>
@endsection