<div class="flex justify-center">
    <label class="flex items-center switch relative inline-block">
        <input wire:model="isActive" type="checkbox" class="sr-only">
        <span class="absolute cursor-pointer slider round rounded-full"></span>
    </label>
</div>
<style>
    .switch {
        width: 48px;
        height: 28px;
    }

    .slider {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(100%);
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
