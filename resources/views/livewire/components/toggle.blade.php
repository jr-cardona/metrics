<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
    <input
        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
        name="toggle" id="{{ 'toggle-'.$modelId }}" wire:model.debounce.1000ms="isActive" type="checkbox"
    >
    <label for="{{ 'toggle-'.$modelId }}" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    <style>
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }
        .toggle-checkbox:checked + .toggle-label {
            @apply: bg-green-400;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }
    </style>
</div>
