<x-index>
    <x-slot name="title">
        <div class="flex justify-between">
            <div class="flex items-center">
                <x-search></x-search>
                <x-pagination :paginationOptions="$paginationOptions"></x-pagination>
            </div>
            <a href="{{ $createRoute ?? '' }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                {{ $createLabel ?? 'New' }}
            </a>
        </div>
    </x-slot>
    <x-slot name="header">
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">title</x-slot>
                <x-slot name="fieldLabel">{{ __('Title') }}</x-slot>
            </x-sort-button>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">dimension_id</x-slot>
                <x-slot name="fieldLabel">{{ __('Dimension') }}</x-slot>
            </x-sort-button>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">is_active</x-slot>
                <x-slot name="fieldLabel">{{ __('Enabled') }}</x-slot>
            </x-sort-button>
        </th>
    </x-slot>
    <x-slot name="content">
        @foreach($questions as $question)
            <tr class="even:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-600">{{ $question->title }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-600">
                        <a href="{{ $question->dimension?->url()->show() }}" class="text-indigo-500 hover:text-indigo-900">
                            {{ $question->dimension?->name }}
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <livewire:components.toggle
                        :key="$question->id"
                        :field="'is_active'"
                        :model="$question"
                    ></livewire:components.toggle>
                </td>
                <td class="px-6 py-4 text-right text-sm font-medium">
                    <x-actions-buttons>
                        <x-slot name="show">{{ $question->url()->show() }}</x-slot>
                        <x-slot name="edit">{{ $question->url()->edit() }}</x-slot>
                    </x-actions-buttons>
                </td>
            </tr>
        @endforeach
    </x-slot>
    <x-slot name="links">
        {{ $questions->links() }}
    </x-slot>
</x-index>
