<div class="flex justify-end items-center">
    @isset($show)
        <a href="{{ $show }}" class="text-gray-500 hover:text-gray-900">
            <x-icons.show></x-icons.show>
        </a>
    @endisset
    @isset($edit)
        <a href="{{ $edit }}" class="text-gray-500 hover:text-gray-900 px-3">
            <x-icons.edit></x-icons.edit>
        </a>
    @endisset
    @isset($id)
        <button wire:click="$emit('openDeleteModal', {{ $id }})" class="text-red-500 hover:text-red-900">
            <x-icons.delete></x-icons.delete>
        </button>
    @endisset
</div>
