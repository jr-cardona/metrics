<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="fields">
        <x-index>
            <x-slot name="title">
                <h2 class="text-center text-2xl">{{ __('Participant questions') }}</h2>
            </x-slot>
            <x-slot name="header">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    {{ __('#') }}
                </th>
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
                @foreach($participantQuestions as $question)
                    <tr wire:sortable.item="{{ $question->getKey() }}"
                        wire:key="question-{{ $question->getKey() }}"
                        class="even:bg-gray-50"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->number }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->type }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ implode(', ', $question->options) }}</div>
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
                                <x-slot name="edit">{{ $question->url()->edit() }}</x-slot>
                            </x-actions-buttons>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
        <x-index>
            <x-slot name="title">
                <h2 class="text-center text-2xl">{{ __('Survey questions') }}</h2>
            </x-slot>
            <x-slot name="header">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    {{ __('#') }}
                </th>
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
                    {{ __('Dimension') }}
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    {{ __('Enabled') }}
                </th>
            </x-slot>
            <x-slot name="content">
                @foreach($surveyQuestions as $question)
                    <tr wire:sortable.item="{{ $question->getKey() }}"
                        wire:key="question-{{ $question->getKey() }}"
                        class="even:bg-gray-50"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->number }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->type }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ implode(', ', $question->options) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">
                                <a href="{{ $question->dimension?->url()->show() }}"
                                   class="text-indigo-500 hover:text-indigo-900">
                                    {{ $question->dimension?->name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <livewire:components.toggle
                                :key="$question->getKey()"
                                :field="'is_active'"
                                :model="$question"
                            ></livewire:components.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <x-actions-buttons>
                                <x-slot name="edit">{{ $question->url()->edit() }}</x-slot>
                            </x-actions-buttons>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
    </x-slot>
</x-show>
