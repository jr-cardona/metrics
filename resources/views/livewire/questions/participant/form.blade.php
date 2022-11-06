<x-jet-dialog-modal wire:model.debounce.1000ms="showModalForm">
    <x-slot name="title">
        @if (isset($this->question) && $this->question->exists)
            {{ __('Edit') . ' ' . __('question') . ': ' }} {{ $this->question->title }}
        @else
            {{ __('Create') . ' ' . __('question') }}
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
                wire:model.debounce.1000ms="question.title"
            ></x-jet-input>
            <x-jet-input-error for="question.title" class="mt-2"></x-jet-input-error>
        </div>
        <div class="mt-4">
            <x-jet-label for="question.type" value="{{ __('Type') }}"></x-jet-label>
            <select
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                id="question.type"
                name="question.type"
                wire:model.debounce.1000ms="question.type"
            >
                <option value="">--</option>
                @foreach($types as $type)
                    <option value="{{ $type }}">
                        {{ __($type) }}
                    </option>
                @endforeach
            </select>
            <x-jet-input-error for="question.type" class="mt-2"></x-jet-input-error>
        </div>
        @if(in_array($this->question->type, \App\Enums\QuestionTypes::withOptions()))
            <div class="mt-4">
                <div class="flex">
                    <x-jet-label value="{{ __('Options') }}"></x-jet-label>
                    <button class="text-gray-500 hover:text-red-900"
                            wire:click="addOption"
                            title="{{ __('Create') }}"
                    >
                        <x-icons.create></x-icons.create>
                    </button>
                </div>
                @foreach($this->options as $index => $option)
                    <div class="flex items-center">
                        <x-jet-label class="mr-2" for="options.{{$index}}">{{ $index + 1 }}.</x-jet-label>
                        @if($option['is_saved'])
                            <span>{{ $option['value'] }}</span>
                            <button class="text-gray-500 hover:text-gray-900 px-3"
                                    wire:click.prevent="editOption({{ $index }})"
                                    title="{{ __('Edit') }}"
                            >
                                <x-icons.edit></x-icons.edit>
                            </button>
                            <button class="text-red-500 hover:text-red-900"
                                    wire:click.prevent="removeOption({{ $index }})"
                            >
                                <x-icons.delete></x-icons.delete>
                            </button>
                        @else
                            <x-jet-input
                                class="block mt-1"
                                id="options.{{$index}}"
                                name="options.{{$index}}"
                                type="text"
                                wire:model.debounce.1000ms="options.{{$index}}.value"
                            ></x-jet-input>
                            <button class="text-gray-500 hover:text-gray-900 px-2"
                                    wire:click.prevent="saveOption({{ $index }})"
                                    title="{{ __('Save') }}"
                            >
                                <x-icons.save></x-icons.save>
                            </button>
                            <x-jet-input-error for="options.{{$index}}" class="mt-2"></x-jet-input-error>
                        @endif
                    </div>
                @endforeach
                <x-jet-input-error for="question.options" class="mt-2"></x-jet-input-error>
            </div>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button class="mr-auto" wire:click="$toggle('showModalForm')" wire:loading.attr="disabled">
            <x-icons.cancel></x-icons.cancel>
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
            <x-icons.save></x-icons.save>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
