<x-index :paginationOptions="$paginationOptions"
                 :createRoute="$createRoute"
                 :createLabel="$createLabel"
>
    <x-slot name="header">
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">name</x-slot>
                <x-slot name="fieldLabel">{{ __('Name') }}</x-slot>
            </x-sort-button>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
            <x-sort-button :sortField="$sortField" :sortDesc="$sortDesc">
                <x-slot name="field">survey_id</x-slot>
                <x-slot name="fieldLabel">{{ __('Survey') }}</x-slot>
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
        @foreach($dimensions as $dimension)
            <tr class="even:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $dimension->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">
                        <a href="{{ $dimension->survey->url()->show() }}" class="text-indigo-500 hover:text-indigo-900">
                            {{ $dimension->survey->title }}
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $dimension->created_at->diffForHumans() }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <x-actions-buttons>
                        <x-slot name="show">{{ $dimension->url()->show() }}</x-slot>
                        <x-slot name="edit">{{ $dimension->url()->edit() }}</x-slot>
                        <x-slot name="id">{{ $dimension->getKey() }}</x-slot>
                    </x-actions-buttons>
                </td>
            </tr>
        @endforeach
        <livewire:components.delete :modelClass="\App\Models\Dimension::class"></livewire:components.delete>
    </x-slot>
    <x-slot name="links">
        {{ $dimensions->links() }}
    </x-slot>
</x-index>
