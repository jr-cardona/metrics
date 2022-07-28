<x-jet-input
    id="{{ $question['pivot']['id'] }}"
    name="{{ $question['pivot']['id'] }}"
    wire:model="participantQuestions.{{$index}}.pivot.{{$question['pivot']['id']}}"
    type="email"
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
></x-jet-input>
<x-jet-input-error for="participantQuestions.{{$index}}.pivot.{{$question['pivot']['id']}}"
                   class="mt-2"
></x-jet-input-error>
