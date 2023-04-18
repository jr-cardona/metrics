<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="label">{{ __('Participants') }}</x-slot>
    <x-slot name="fields">
        <x-index :footer="false">
            <x-slot name="header">
                @foreach($questions as $id => $title)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        {{ $title }}
                    </th>
                @endforeach
            </x-slot>
            <x-slot name="content">
                @foreach($participants as $participant)
                    <tr class="even:bg-gray-50">
                        @foreach($participant->answers as $answer)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $answer->value }}</div>
                            </td>
                        @endforeach
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <x-actions-buttons>
                                <x-slot name="show">{{ route('surveys.participants.show', [$this->survey, $participant]) }}</x-slot>
                            </x-actions-buttons>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
    </x-slot>
</x-show>
