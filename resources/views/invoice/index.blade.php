@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h2 class="mb-2 text-2xl font-medium">Jasa</h2>
    @include('component.alert')
    <a href="{{ route('jasa.create') }}"
        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">New
    </a>
    <div class="mt-4">

        @include('component.datePicker')

        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div
                    class="mb-6 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        @include('component.thead',['head'=>[
                        'No',
                        'Name',
                        'Date',
                        'Amount',
                        'Action'
                        ]])
                        <tbody class="bg-white">
                            @foreach ($invoices as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->no }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->customer->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ Str::of($item->date)->title() }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $item->amount }}
                                </td>
                                {{-- <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                    @include('component.tableAction',[
                                    'route' => 'jasa.edit',
                                    'id' => $item->no,
                                    'name' => $item->amount,
                                    ])
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- pagination link --}}
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
    style="background: rgba(0,0,0,.7);">
    <div
        class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Delete</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="my-5 modal-body">
                <p></p>
            </div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
                <button
                    class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                {{-- form delete --}}
                <form class="form-delete" action="{{ route('jasa.destroy',1)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400"
                        type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}

@endsection

@push('scripts')
{{-- script for modal --}}
<script>
    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');
    const modalBody = document.querySelectorAll('.modal-body p');
    const formDelete = document.querySelectorAll('.form-delete');

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    const openModal = (name,id) => {
        console.log(`${name} ${id}`);
        modalBody[0].textContent= `Apa anda ingin menghapus ${name} ?`;
        formDelete[0].action=`http://localhost:8000/jasa/${id}`;
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {

        const elements = closeButton[i];

        elements.onclick = (e) => modalClose();

        modal.style.display = 'none';

        window.onclick = function (event) {
            if (event.target == modal) modalClose();
        }
    }
</script>
@endpush