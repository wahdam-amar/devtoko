@if (Session::has('message'))
<div class="cointainer min-w-full">
    <div x-data="{ show: true }" x-show="show" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500">
        <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell" />
        </span>
        <span class="inline-block align-middle mr-8">
            {{ Session::get('message') ?? ''}}
        </span>
        <button @click="show = false"
            class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
            <span>×</span>
        </button>
    </div>
</div>
@endif