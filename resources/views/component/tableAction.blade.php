<form class="inline-block" action="{{ route($route,$id) }}">
    <button type="submit" class="px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded">
        Edit
    </button>
</form>

<button onclick="openModal('{{ Str::title($name) }}',{{ $id }})"
    class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded">Delete
</button>