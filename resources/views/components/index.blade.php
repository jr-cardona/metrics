<div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex items-center">
                <label for="search" class="mr-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </label>
                <x-jet-input id="search" wire:model="search" type="search" placeholder="{{ __('Search') }}..."></x-jet-input>
                <div class="ml-6 inline-flex justify-center items-center">
                    <label for="paginate" class="mr-2">{{ __('Show ') }}</label>
                    <select wire:model="paginate" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="paginate">
                        @foreach($paginationOptions as $option)
                            <option>{{ $option }}</option>
                        @endforeach
                    </select>
                    <span class="ml-2">{{ __('entries ') }}</span>
                </div>
            </div>

            <a href="{{ $createRoute ?? '' }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                {{ $createLabel ?? 'New' }}
            </a>
        </div>
        <div class="flex flex-col mt-10">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-indigo-600 text-white">
                                <tr>
                                    {{ $header }}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __('Actions') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot class="bg-indigo-600 text-white">
                                <tr>
                                    {{ $header }}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __('Actions') }}</span>
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody class="bg-white divide-y divide-gray-200">
                            {{ $content }}
                            </tbody>
                        </table>
                        <div class="px-4 py-3 bg-gray-50 border-t">
                            {{ $links }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
