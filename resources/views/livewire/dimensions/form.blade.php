<div>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    {{ ($dimension->exists ? __('Edit') : __('New')) . __(' dimension') }}
                </x-slot>
                <x-slot name="description">
                    {{ $dimension->exists ? $dimension->name : '' }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" :value="__('Name')"/>
                        <x-jet-input wire:model="dimension.name" id="name" class="mt-1 block w-full" type="text" />
                        <x-jet-input-error for="dimension.name" class="mt-2" />
                    </div>
                    <x-slot name="actions">
                        @if($dimension->exists)
                            <livewire:components.delete-modal :model="$dimension">
                                <x-jet-danger-button wire:click="$emit('confirmDeletion', {{ $dimension }})" class="mr-auto">{{ __('Delete') }}</x-jet-danger-button>
                            </livewire:components.delete-modal>
                        @endif
                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
