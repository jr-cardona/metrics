<div class="ml-6 inline-flex justify-center items-center">
    <label for="paginate" class="mr-2">{{ __('Show') . ' ' }}</label>
    <select wire:model="paginate" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="paginate">
        @foreach($paginationOptions as $option)
            <option>{{ $option }}</option>
        @endforeach
    </select>
    <span class="ml-2">{{ __('entries') }}</span>
</div>
