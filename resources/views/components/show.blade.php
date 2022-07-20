<div class="py-2">
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-indigo-400 hover:text-indigo-600" href="{{ $model->url()->index() }}">
                {{ $title }}
            </a>
            <span class="mx-5">></span>
            {{ $model->name ?? $model->title }}
            <span class="mx-5">></span>
            <span>{{ __('Details') }}</span>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $fields }}
    </div>
</div>
