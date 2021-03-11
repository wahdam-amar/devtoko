@if ($errors->any())
@foreach ($errors->all() as $error)
<div x-data="{ errorModal: true }" x-show="errorModal"
    class="mb-2 mt-2 flex justify-between items-center bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg">
    <div>
        <span class="font-semibold text-yellow-700">Error : </span>
        {{ Str::title($error) }}
    </div>
    <div>
        <button type="button" @click="errorModal = false" class=" text-yellow-700">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>
@endforeach
@endif