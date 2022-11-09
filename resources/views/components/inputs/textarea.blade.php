<textarea
    id="{{ $id }}"
    name="{{ $id }}"
    wire:model="{{ $wire }}"
    type="text"
    class="
    block
    w-full
    mt-1
    border-gray-300
    rounded-md
    shadow-sm
    focus:border-indigo-300
    focus:ring
    focus:ring-indigo-200
    focus:ring-opacity-50"
    required
></textarea>
<x-jet-input-error
    for="{{ $wire }}"
    class="mt-2"
></x-jet-input-error>
