<x-jet-dialog-modal wire:model="showModalForm">
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
                wire:model="question.title"
            ></x-jet-input>
            <x-jet-input-error for="question.title" class="mt-2"></x-jet-input-error>
        </div>
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
