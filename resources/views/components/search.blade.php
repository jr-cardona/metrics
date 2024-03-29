<div class="flex items-center">
    <label for="search" class="mr-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </label>
    <x-jet-input id="search" wire:model.debounce.1000ms="{{ $search ?? 'search' }}" type="search" placeholder="{{ __('Search') }}..."></x-jet-input>
</div>
