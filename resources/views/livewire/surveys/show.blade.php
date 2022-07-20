<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="fields">
        @foreach($survey->dimensions as $dimension)
            <x-index>
                <x-slot name="header">
                    <h2 class="text-xl text-center">{{ __('Dimension: ') . $dimension->name }}</h2>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        {{ __('Title') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        {{ __('Type') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        {{ __('Options') }}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        {{ __('Enabled') }}
                    </th>
                </x-slot>
                <x-slot name="content">
                    @foreach($dimension->questions as $question)
                        <tr class="even:bg-gray-50">
                            <td style="width: 50%" class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ $question->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $question->type }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ implode(', ', $question->options) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <livewire:components.toggle
                                    :key="$question->id"
                                    :field="'is_active'"
                                    :model="$question"
                                ></livewire:components.toggle>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-actions-buttons>
                                    <x-slot name="edit">{{ $question->url()->edit() }}</x-slot>
                                </x-actions-buttons>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-index>
        @endforeach
    </x-slot>
</x-show>
