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
            <form wire:submit.prevent="save">
                <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name" :value="__('Name')"></x-jet-label>
                            <x-jet-input wire:model="dimension.name" id="name" class="mt-2 block w-full" type="text"></x-jet-input>
                            <x-jet-input-error for="dimension.name" class="mt-2"></x-jet-input-error>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
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
                </div>
            </form>
        </div>
    </div>
</div>
