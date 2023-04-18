<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="label">{{ __('Participants') }}</x-slot>
    <x-slot name="fields">
        <div class="flex flex-wrap justify-between">
            @foreach($participants as $participant)
                <div class="max-w-sm rounded overflow-hidden m-4">
                    <table>
                        @foreach($participant->answers as $answer)
                            <tr class="even:bg-gray-50">
                                <td class="px-6 py-3 whitespace-nowrap bg-gray-800 text-white text-xs font-medium uppercase tracking-wider">
                                    {{ $answer->question->title }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-600">
                                    {{ $answer->value }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="px-6 py-3 whitespace-nowrap bg-gray-800 text-white text-xs font-medium uppercase tracking-wider">
                                {{ __('Más detalles') }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-600">
                                <a href="{{ route('surveys.participants.show', [$this->survey, $participant]) }}">
                                    <x-icons.show></x-icons.show>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-show>
