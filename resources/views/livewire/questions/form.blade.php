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
                <div class="flex">
                    <x-jet-label value="{{ __('Options') }}"></x-jet-label>
                    <button class="text-indigo-500 hover:text-red-900"
                            wire:click="addOption()"
                            title="{{ __('Create') }}"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                </div>
                @foreach($this->options as $index => $option)
                    <div class="flex items-center">
                        <x-jet-label class="mr-2" for="options.{{$index}}">{{ $index + 1 }}.</x-jet-label>
                        @if($option['is_saved'])
                            <span>{{ $option['value'] }}</span>
                            <button class="text-indigo-500 hover:text-indigo-900 px-3"
                                    wire:click.prevent="editOption({{ $index }})"
                                    title="{{ __('Edit') }}"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-red-900"
                                    wire:click.prevent="removeOption({{ $index }})"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        @else
                            <x-jet-input
                                class="block mt-1"
                                id="options.{{$index}}"
                                name="options.{{$index}}"
                                type="text"
                                wire:model="options.{{$index}}.value"
                            ></x-jet-input>
                            <button class="text-indigo-500 hover:text-indigo-900 px-2"
                                    wire:click.prevent="saveOption({{ $index }})"
                                    title="{{ __('Save') }}"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                            </button>
                            <x-jet-input-error for="options.{{$index}}" class="mt-2"></x-jet-input-error>
                        @endif
                    </div>
                @endforeach
                <x-jet-input-error for="question.options" class="mt-2"></x-jet-input-error>
            </div>
        @endif
        @if(!$isParticipantQuestion)
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
