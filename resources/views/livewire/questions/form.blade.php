<x-form>
    <x-slot name="navigator">
        <a class="text-indigo-400 hover:text-indigo-600" href="{{ route('questions.index') }}">
            {{ __('Questions') }}
        </a>
        @if($question->exists)
            <span class="mx-5">></span>
            {{ $question->title }}
            <span class="mx-5">></span>
            <span>{{ __('Edit') }}</span>
        @else
            <span class="mx-5">></span>
            <span>{{ __('Create') }}</span>
        @endif
    </x-slot>
    <x-slot name="fields">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" :value="__('Title')"></x-jet-label>
            <x-jet-input wire:model="question.title" id="title" class="mt-2 block w-full" type="text"></x-jet-input>
            <x-jet-input-error for="question.title" class="mt-2"></x-jet-input-error>
        </div>
    </x-slot>
    <x-slot name="back">
        {{ route('questions.index') }}
    </x-slot>
</x-form>
