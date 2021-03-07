<thead class="bg-gray-100">
    <tr>
        @foreach ($head as $item)
        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
            style="text-align: start">
            {{ $item }}
        </th>
        @endforeach
    </tr>
</thead>