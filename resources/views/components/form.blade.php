<div class="py-2">
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-gray-400 hover:text-gray-600" href="{{ $model->url()->index() }}">
                {{ $title }}
            </a>
            @if($model->exists)
                <span class="mx-5">></span>
                {{ $model->name ?? $model->title }}
                <span class="mx-5">></span>
                <span>{{ __('Edit') }}</span>
            @else
                <span class="mx-5">></span>
                <span>{{ __('Create') }}</span>
            @endif
        </div>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="save">
                <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                    <div class="grid grid-cols-6 gap-6">
                        {{ $fields }}
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <a href="{{ $model->url()->index() }}" class="mr-auto">
                        <x-jet-danger-button>
                            <x-icons.cancel></x-icons.cancel>
                            {{ __('Cancel') }}
                        </x-jet-danger-button>
                    </a>
                    <x-jet-button>
                        <x-icons.save></x-icons.save>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
