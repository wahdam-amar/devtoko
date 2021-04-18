{{-- Datepicker --}}
<form action="{{ url()->current() }}">
    <div class="flex flex-wrap overflow-hidden md:-mx-4">
        <div class="w-full overflow-hidden md:my-4 md:px-4 md:w-1/2 my-2">
            <input type="text" name="startdate"
                class="flatpickr flatpickr-input pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Select Date..">
        </div>
        <div class="w-full overflow-hidden md:my-4 md:px-4 md:w-1/3 my-2">
            <input type="text" name="enddate"
                class="flatpickr flatpickr-input pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                placeholder="Select Date..">
        </div>
        <div class="w-full overflow-hidden md:my-4 md:px-4 md:w-1/6 my-2">
            <button type="submit"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">Search
            </button>
        </div>
    </div>
</form>
{{-- End Datepicker --}}