<div class="py-2">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2 class="text-2xl">
                <a class="text-indigo-400 hover:text-indigo-600" href="{{ route('dimensions.index') }}">
                    {{ __('Dimensions') }}
                </a>
                @if($dimension->exists)
                    <span class="mx-5">></span>
                    {{ $dimension->name }}
                    <span class="mx-5">></span>
                    <span>{{ __('Edit') }}</span>
                @else
                    <span class="mx-5">></span>
                    <span>{{ __('Create') }}</span>
                @endif
            </h2>
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title"></x-slot>
                <x-slot name="description"></x-slot>
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" :value="__('Name')"></x-jet-label>
                        <x-jet-input wire:model="dimension.name" id="name" class="mt-2 block w-full" type="text"></x-jet-input>
                        <x-jet-input-error for="dimension.name" class="mt-2"></x-jet-input-error>
                    </div>
                    <x-slot name="actions">
                        <a href="{{ route('dimensions.index') }}" class="mr-auto">
                            <x-jet-danger-button>
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            {{ __('Cancel') }}
                            </x-jet-danger-button>
                        </a>
                        <x-jet-button>
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
