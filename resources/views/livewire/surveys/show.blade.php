<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="fields">
        <x-index :footer="false">
            <x-slot name="title">
                <div class="flex justify-between">
                    <h2 class="text-center text-2xl">{{ __('Participant questions') }}</h2>
                    <x-jet-button class="mx-10" wire:click="openQuestionModal(null, false)">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Create participant question') }}
                    </x-jet-button>
                </div>
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
                            <button class="text-indigo-500 hover:text-indigo-900 px-3"
                                    wire:click="openQuestionModal({{ $question->getKey() }}, false)">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
        <x-index :footer="false">
            <x-slot name="title">
                <div class="flex justify-between">
                    <h2 class="text-center text-2xl">{{ __('Survey questions') }}</h2>
                    <x-jet-button class="mx-10" wire:click="openQuestionModal">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Create survey question') }}
                    </x-jet-button>
                </div>
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
                                :key="'question-'.$question->getKey()"
                                :field="'is_active'"
                                :model="$question"
                            ></livewire:components.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <button class="text-indigo-500 hover:text-indigo-900 px-3"
                                    wire:click="openQuestionModal({{ $question->getKey() }})">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
        <x-jet-dialog-modal wire:model="showModalForm">
            <x-slot name="title">
                @if (isset($this->question) && $this->question->exists)
                    {{ __('Edit question: ') }} {{ $title }}
                @else
                    {{ __('Create question') }}
                @endif
            </x-slot>

            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}"></x-jet-label>
                    <x-jet-input
                        class="block mt-1 w-full"
                        id="title"
                        name="title"
                        type="text"
                        wire:model="title"
                    ></x-jet-input>
                    <x-jet-input-error for="title" class="mt-2"></x-jet-input-error>
                </div>
                <div class="mt-4">
                    <x-jet-label for="type" value="{{ __('Type') }}"></x-jet-label>
                    <select
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        id="type"
                        name="type"
                        wire:model="type"
                    >
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ $question->type === $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="type" class="mt-2"></x-jet-input-error>
                </div>
                @if(in_array($this->type, \App\Enums\QuestionTypes::withOptions()))
                    <div class="mt-4">
                        <x-jet-label for="options" value="{{ __('Options') }}"></x-jet-label>
                        <select
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="options"
                            name="options"
                            wire:model="options"
                        >
                            <option value="">--</option>
                            @foreach($options as $option)
                                <option value="{{ $option }}" {{ $question->option === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="options" class="mt-2"></x-jet-input-error>
                    </div>
                @endif
                @if ($isSurveyQuestion)
                    <div class="mt-4">
                        <x-jet-label for="dimension_id" value="{{ __('Dimension') }}"></x-jet-label>
                        <select
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            id="dimension_id"
                            name="dimension_id"
                            wire:model="dimension_id"
                        >
                            @foreach($dimensions as $dimension)
                                <option value="{{ $dimension->id }}" {{ $question->dimension_id === $dimension_id ? 'selected' : '' }}>
                                    {{ $dimension->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="dimension_id" class="mt-2"></x-jet-input-error>
                    </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button class="mr-auto" wire:click="$toggle('showModalForm')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-show>
