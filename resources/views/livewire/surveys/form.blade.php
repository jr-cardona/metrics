<x-form :model="$survey">
    <x-slot name="title">
        {{ __('Surveys') }}
    </x-slot>
    <x-slot name="fields">
        <div class="col-span-6 sm:col-span-4 py-4">
            <x-jet-label for="title" :value="__('Title')"></x-jet-label>
            <x-jet-input wire:model.debounce.1000ms="survey.title" id="title" class="mt-2 block w-full" type="text"></x-jet-input>
            <x-jet-input-error for="survey.title" class="mt-2"></x-jet-input-error>
        </div>
        <div class="col-span-6 sm:col-span-4 py-4">
            <x-jet-label for="description" :value="__('Description')"></x-jet-label>
            <textarea wire:model.debounce.1000ms="survey.description"
                      id="description"
                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            <x-jet-input-error for="survey.description" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>
</x-form>
