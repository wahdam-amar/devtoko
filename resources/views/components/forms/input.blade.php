<div x-data="autocomplete('{{ $url }}')">
    <input class="name-input form-input bg-gray-200 border-gray-300 focus:border-indigo-400
        focus:shadow-none focus:bg-white mt-1 block w-full" type="text" x-model="inputValue"
        x-on:input.debounce.750="fetchData()">
    <input class="hidden" type="text" name="{{ $name }}" :value="dataId" x-model="dataId" type="hidden">
    {{-- Loop the data --}}
    <div x-show="listData" class="absolute shadow top-100 z-40 lef-0 rounded overflow-y-auto svelte-5uyqqj">
        <div class="flex flex-col">
            <template x-for="item in storedData">
                <div class="cursor-pointer w-auto border-gray-100 rounded-t border-b 
                hover:bg-teal-100" style="">
                    <div
                        class="flex items-center p-2 pl-2 border-transparent bg-white border-l-2 relative hover:bg-teal-600 hover:text-teal-100 hover:border-teal-600">
                        <div class="items-center flex">
                            <span @click.away="dissmissModal()" @click="returnData(item.id,item.name)"
                                x-text="item.{{ $property }}"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    {{-- End loop data --}}
</div>