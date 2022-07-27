<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="fields">
        <x-index :footer="false">
            <x-slot name="title">
                <div class="flex justify-between">
                    <h2 class="text-center text-2xl">{{ __('Participant questions') }}</h2>
                    <x-search :search="'searchParticipantQuestion'"></x-search>
                    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition"
                            wire:click="$emit('openQuestionModal', null, 'IP')"
                    >
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Create participant question') }}
                    </button>
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
                            <div class="text-sm text-gray-600">{{ $question->pivot->number }}</div>
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
                            <livewire:questions.toggle
                                :key="'toggle-'.$question->getKey()"
                                :field="'is_active'"
                                :model="$question"
                                :surveyId="$survey->getKey()"
                            ></livewire:questions.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex justify-end items-center">
                                <button class="text-indigo-500 hover:text-indigo-900 px-3"
                                        wire:click="$emit('openQuestionModal', {{ $question->getKey() }}, 'IP')"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-500 hover:text-red-900"
                                        wire:click="$emit('openDeleteModal', {{ $question->getKey() }})"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
        <x-index :footer="false">
            <x-slot name="title">
                <div class="flex justify-between">
                    <h2 class="text-center text-2xl">{{ __('Survey questions') }}</h2>
                    <x-search :search="'searchSurveyQuestion'"></x-search>
                    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition"
                            wire:click="$emit('openQuestionModal')"
                    >
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Create survey question') }}
                    </button>
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
                            <div class="text-sm text-gray-600">{{ $question->pivot->number }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ $question->type }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
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
                            <livewire:questions.toggle
                                :key="'toggle-'.$question->getKey()"
                                :field="'is_active'"
                                :model="$question"
                                :surveyId="$survey->getKey()"
                            ></livewire:questions.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex justify-end items-center">
                                <button class="text-indigo-500 hover:text-indigo-900 px-3"
                                        wire:click="$emit('openQuestionModal', {{ $question->getKey() }})"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button wire:click="$emit('openDeleteModal', {{ $question->getKey() }})" class="text-red-500 hover:text-red-900">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-index>
        <livewire:components.delete :parentComponent="App\Http\Livewire\Surveys\Show::getName()" :modelClass="\App\Models\Question::class"></livewire:components.delete>
        <livewire:questions.form :surveyId="$survey->getKey()"></livewire:questions.form>
    </x-slot>
</x-show>
