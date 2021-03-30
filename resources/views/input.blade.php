@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow mt-4">
    <h2 class="text-2xl font-medium">Casual forms</h2>
    <div class="mt-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <label class="block">
                <span class="text-gray-700">Name</span>
                <div x-data="autocomplete('http://localhost:8000/json/customer?query')">
                    <input class=" name-input form-input bg-gray-200 border-gray-300 focus:border-indigo-400
                        focus:shadow-none focus:bg-white mt-1 block w-full" type="text" x-model="inputValue"
                        x-on:input.debounce.750="fetchData()">

                    {{-- Loop the data --}}
                    <div x-show="listData"
                        class="absolute shadow top-100 z-40 lef-0 rounded overflow-y-auto svelte-5uyqqj">
                        <div class="flex flex-col">
                            <template x-for="item in storedData">
                                <div class="cursor-pointer w-auto border-gray-100 rounded-t border-b 
                                hover:bg-teal-100" style="">
                                    <div
                                        class="flex items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 hover:border-teal-600">
                                        <div class="items-center flex">
                                            <span x-text="item.name"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>
            </label>
            <label class="block">
                <span class="text-gray-700">Email address</span>
                <div x-data="autocomplete('http://localhost:8000/json/customer?query')" x-init="init()">
                    <input
                        class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                        type="text" x-model="inputValue" x-on:input.debounce.750="fetchData()">
                    <input class="hidden" type="text" name="id" :value="dataId" x-model="dataId" type="hidden">
                    {{-- Loop the data --}}
                    <div x-show="listData"
                        class="absolute shadow top-100 z-40 lef-0 rounded overflow-y-auto svelte-5uyqqj">
                        <div class="flex flex-col">
                            <template x-for="item in storedData">
                                <div class="cursor-pointer w-auto border-gray-100 rounded-t border-b 
                            hover:bg-teal-100" style="">
                                    <div
                                        class="flex items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 hover:border-teal-600">
                                        <div class="items-center flex">
                                            <span @click.away="dissmissModal()" @click="returnData(item.id,item.name)"
                                                x-text="item.name"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </label>
            <label class="block">
                <span class="text-gray-700">Name</span>
                <input
                    class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                    type="text">
            </label>
            <label class="block">
                <span class="text-gray-700">Email address</span>
                <input
                    class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                    type="text">
            </label>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function autocomplete(url) {
        return {
            storedData:[],
            listData:false,
            inputValue:null,
            dataId:null,
            log(){
                console.log(this.inputValue)
            },
            init(){
              console.log();  
            },
            dissmissModal(){
                this.listData=false;
            },
            returnData(id,name){
                this.inputValue=name;
                this.dataId=id;
            },
            fetchData(){
                fetch(`${url}=${this.inputValue}`)
                      .then(response => response.json())
                      .then(data => this.storedData = data);
                    //   console.log(this.storedData);
                      this.listData=true;
            },
        }
    }
</script>
@endpush