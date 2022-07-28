<div class="mt-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="my-4">
        <h2 class="text-2xl">{{ $this->survey->title }}</h2>
    </div>
    <div class="my-4">
        <h3>{{ $this->survey->description }}</h3>
    </div>
    <div class="flex items-center justify-center h-8 border-b sm:rounded-md bg-gray-800 text-white">
        {{ __('Step') }} {{ $this->currentStep }} / {{ $this->totalSteps }}
    </div>
    <div class="p-6 border border-gray-300 sm:rounded-md">
        @csrf
        @if($this->currentStep === 1)
            @foreach($participantQuestions as $id => $question)
                <label class="block mb-6">
                    <span class="text-gray-700">{{ $question['title'] }}</span>
                    <x-dynamic-component
                        :component="'inputs.'.$question['type']"
                        :id="$id"
                        :question="$question"
                    ></x-dynamic-component>
                </label>
            @endforeach
        @endif
        @if($this->currentStep === 2)
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                    @foreach(\App\Enums\QuestionTypes::radioOptions() as $option)
                        <th scope="col" class="px-6 py-3">{{ $option }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($surveyQuestions as $id => $question)
                    <tr>
                        <td class="py-6">{{ $question['number'] }}.</td>
                        <td>{{ $question['title'] }}</td>
                        @foreach(\App\Enums\QuestionTypes::radioOptions() as $key => $option)
                            <td class="text-center">
                                <x-jet-input
                                    name="{{ $id }}"
                                    value="{{ $key }}"
                                    wire:model="surveyQuestions.{{ $id }}.value"
                                    type="radio">
                                </x-jet-input>
                                <x-jet-input-error for="surveyQuestions.{{ $id }}.value"
                                                   class="mt-2"
                                ></x-jet-input-error>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        @if($this->currentStep === $this->totalSteps)
            <div class="mb-2 mt-4 flex justify-between">
                <x-jet-secondary-button wire:click.prevent="decreaseStep" class="h-10">
                    {{ __('Previous') }}
                </x-jet-secondary-button>
                <x-jet-button wire:click.prevent="submit" class="h-10">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        @elseif($this->currentStep === 1)
            <div class="mb-2 mt-4 flex justify-end">
                <x-jet-secondary-button wire:click.prevent="increaseStep" class="h-10">
                    {{ __('Next') }}
                </x-jet-secondary-button>
            </div>
        @elseif($this->currentStep === 2)
            <div class="mb-2 mt-6 flex justify-between">
                <x-jet-secondary-button wire:click.prevent="decreaseStep" class="h-10">
                    {{ __('Previous') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button wire:click.prevent="increaseStep" class="h-10">
                    {{ __('Next') }}
                </x-jet-secondary-button>
            </div>
        @endif
    </div>
</div>
