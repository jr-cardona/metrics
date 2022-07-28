<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="fields">
        <x-index :footer="false">
            <x-slot name="title">
                <div class="flex justify-between">
                    <h2 class="text-center text-2xl">{{ __('Participant questions') }}</h2>
                    <x-search :search="'searchParticipantQuestion'"></x-search>
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition"
                            wire:click="$emit('openQuestionModal', null, 'IP')"
                    >
                        <x-icons.create></x-icons.create>
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
                    {{ __('Dimension') }}
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
                            <div class="text-sm text-gray-600">{{ __($question->type) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">{{ implode(', ', $question->options) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">
                                <a href="{{ $question->dimension?->url()->show() }}"
                                   class="text-gray-500 hover:text-gray-900">
                                    {{ $question->dimension?->name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <livewire:questions.toggle
                                :key="'toggle-'.$question->getKey()"
                                :field="'is_active'"
                                :question="$question->getKey()"
                                :surveyId="$survey->getKey()"
                            ></livewire:questions.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex justify-end items-center">
                                <button class="text-gray-500 hover:text-gray-900 px-3"
                                        wire:click="$emit('openQuestionModal', {{ $question->getKey() }}, 'IP')"
                                >
                                    <x-icons.edit></x-icons.edit>
                                </button>
                                <button class="text-red-500 hover:text-red-900"
                                        wire:click="$emit('openDeleteModal', {{ $question->getKey() }})"
                                >
                                    <x-icons.delete></x-icons.delete>
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
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition"
                            wire:click="$emit('openQuestionModal')"
                    >
                        <x-icons.create></x-icons.create>
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
                            <div class="text-sm text-gray-600">{{ __($question->type) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600">
                                @if($question->type === \App\Enums\QuestionTypes::radio->name)
                                    {{ implode(', ', array_keys(\App\Enums\QuestionTypes::radioOptions())) }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-600">
                                <a href="{{ $question->dimension?->url()->show() }}"
                                   class="text-gray-500 hover:text-gray-900">
                                    {{ $question->dimension?->name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <livewire:questions.toggle
                                :key="'toggle-'.$question->getKey()"
                                :field="'is_active'"
                                :question="$question->getKey()"
                                :surveyId="$survey->getKey()"
                            ></livewire:questions.toggle>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex justify-end items-center">
                                <button class="text-gray-500 hover:text-gray-900 px-3"
                                        wire:click="$emit('openQuestionModal', {{ $question->getKey() }})"
                                >
                                    <x-icons.edit></x-icons.edit>
                                </button>
                                <button wire:click="$emit('openDeleteModal', {{ $question->getKey() }})" class="text-red-500 hover:text-red-900">
                                    <x-icons.delete></x-icons.delete>
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
