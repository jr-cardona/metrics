<x-form :model="$question">
    <x-slot name="title">
        {{ __('Questions') }}
    </x-slot>
    <x-slot name="fields">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" :value="__('Title')"></x-jet-label>
            <x-jet-input wire:model="question.title" id="title" class="mt-2 block w-full" type="text"></x-jet-input>
            <x-jet-input-error for="question.title" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>
</x-form>
