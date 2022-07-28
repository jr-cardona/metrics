<x-form :model="$dimension">
    <x-slot name="title">
        {{ __('Dimensions') }}
    </x-slot>
    <x-slot name="fields">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" :value="__('Name')"></x-jet-label>
            <x-jet-input wire:model="dimension.name" id="name" class="mt-2 block w-full" type="text"></x-jet-input>
            <x-jet-input-error for="dimension.name" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>
</x-form>
