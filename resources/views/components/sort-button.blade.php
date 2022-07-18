<button class="flex items-center uppercase hover:underline" wire:click="sortBy('{{ $field }}')">
    {{ $fieldLabel }}
    @if((string) $sortField === (string) $field)
        <svg class="w-3 h-3 ml-1 duration-200 @if(!$sortDesc) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
    @endif
</button>
