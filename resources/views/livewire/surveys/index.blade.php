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
                <x-slot name="field">is_active</x-slot>
                <x-slot name="fieldLabel">{{ __('Enabled') }}</x-slot>
            </x-sort-button>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">created_at</x-slot>
                <x-slot name="fieldLabel">{{ __('Created At') }}</x-slot>
            </x-sort-button>
        </th>
    </x-slot>
    <x-slot name="content">
        @foreach($surveys as $survey)
            <tr class="even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $survey->title }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $survey->is_active }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $survey->created_at->diffForHumans() }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <x-actions-buttons>
                        <x-slot name="show">{{ $survey->url()->show() }}</x-slot>
                        <x-slot name="edit">{{ $survey->url()->edit() }}</x-slot>
                    </x-actions-buttons>
                </td>
            </tr>
        @endforeach
        <livewire:surveys.delete></livewire:surveys.delete>
    </x-slot>
    <x-slot name="links">
        {{ $surveys->links() }}
    </x-slot>
</x-index>
