<x-index :paginationOptions="$paginationOptions"
                 :createRoute="$createRoute"
                 :createLabel="$createLabel"
>
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
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $question->title }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">
                        <a href="{{ $question->dimension?->url()->show() }}" class="text-indigo-500 hover:text-indigo-900">
                            {{ $question->dimension?->name }}
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $question->is_active }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <x-actions-buttons>
                        <x-slot name="show">{{ $question->url()->show() }}</x-slot>
                        <x-slot name="edit">{{ $question->url()->edit() }}</x-slot>
                    </x-actions-buttons>
                </td>
            </tr>
        @endforeach
        <livewire:questions.delete></livewire:questions.delete>
    </x-slot>
    <x-slot name="links">
        {{ $questions->links() }}
    </x-slot>
</x-index>
