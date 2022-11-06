<div>
    <x-jet-confirmation-modal wire:model.debounce.1000ms="showDeleteModal">
        <x-slot name="title"> {{ __('Delete') . ' ' . __('record') }}</x-slot>
        <x-slot name="content">{{ __('Are you sure you want to delete this record?') }}</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click.prevent="$set('showDeleteModal', false)" class="mr-auto">{{ __('Cancel') }}</x-jet-secondary-button>
            <x-jet-danger-button wire:click.prevent="delete">{{ __('Delete') }}</x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
