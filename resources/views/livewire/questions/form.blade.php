<x-jet-dialog-modal wire:model="showModalForm">
    <x-slot name="title">
        @if (isset($this->question) && $this->question->exists)
            {{ __('Edit question: ') }} {{ $this->question->title }}
        @else
            {{ __('Create question') }}
        @endif
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-jet-label for="question.title" value="{{ __('Title') }}"></x-jet-label>
            <x-jet-input
                class="block mt-1 w-full"
                id="question.title"
                name="question.title"
                type="text"
                wire:model="question.title"
            ></x-jet-input>
            <x-jet-input-error for="question.title" class="mt-2"></x-jet-input-error>
        </div>
        <div class="mt-4">
            <x-jet-label for="question.type" value="{{ __('Type') }}"></x-jet-label>
            <select
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                id="question.type"
                name="question.type"
                wire:model="question.type"
            >
                <option value="">--</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            <x-jet-input-error for="question.type" class="mt-2"></x-jet-input-error>
        </div>
        @if(in_array($this->question->type, \App\Enums\QuestionTypes::withOptions()))
            <div class="mt-4">
                <x-jet-label for="question.options" value="{{ __('Options') }}"></x-jet-label>
                <select
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    id="question.options"
                    name="question.options"
                    wire:model="question.options"
                >
                    <option value="">--</option>
                    @foreach($this->question->options as $option)
                        <option value="{{ $option }}">
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="question.options" class="mt-2"></x-jet-input-error>
            </div>
        @endif
        @if ($this->question->isSurveyDimension())
            <div class="mt-4">
                <x-jet-label for="question.dimension_id" value="{{ __('Dimension') }}"></x-jet-label>
                <select
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    id="question.dimension_id"
                    name="question.dimension_id"
                    wire:model="question.dimension_id"
                >
                    <option value="">--</option>
                    @foreach($dimensions as $id => $name)
                        <option value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="question.dimension_id" class="mt-2"></x-jet-input-error>
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
