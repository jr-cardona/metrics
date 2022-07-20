<x-form :model="$survey">
    <x-slot name="title">
        {{ __('Surveys') }}
    </x-slot>
    <x-slot name="fields">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" :value="__('Title')"></x-jet-label>
            <x-jet-input wire:model="survey.title" id="title" class="mt-2 block w-full" type="text"></x-jet-input>
            <x-jet-input-error for="survey.title" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>
</x-form>
