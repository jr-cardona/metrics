@extends('layouts.index')
@section('header')
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
        <button class="flex items-center uppercase hover:underline" wire:click="sortBy('number')">
            {{ __('Number') }}
            @if($sortField === 'number')
                <svg class="w-3 h-3 ml-1 duration-200 @if(!$sortDesc) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            @endif
        </button>
    </th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
        <button class="flex items-center uppercase hover:underline" wire:click="sortBy('title')">
            {{ __('Title') }}
            @if($sortField === 'title')
                <svg class="w-3 h-3 ml-1 duration-200 @if(!$sortDesc) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            @endif
        </button>
    </th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
        <button class="flex items-center uppercase hover:underline" wire:click="sortBy('created_at')">
            {{ __('Created At') }}
            @if($sortField === 'created_at')
                <svg class="w-3 h-3 ml-1 duration-200 @if(!$sortDesc) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            @endif
        </button>
    </th>
    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
        <button class="flex items-center uppercase hover:underline" wire:click="sortBy('dimension_id')">
            {{ __('Dimension') }}
            @if($sortField === 'dimension_id')
                <svg class="w-3 h-3 ml-1 duration-200 @if(!$sortDesc) rotate-180 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            @endif
        </button>
    </th>
@endsection
@section('content')
    @foreach($questions as $question)
        <tr class="even:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-600">{{ $question->number }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-600">{{ $question->title }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-600">{{ $question->created_at->diffForHumans() }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-600">
                    <a href="{{ $question->dimension->url()->show() }}" class="text-indigo-500 hover:text-indigo-900">
                        {{ $question->dimension->name }}
                    </a>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end items-center">
                    <a href="{{ $question->url()->show() }}" class="text-indigo-500 hover:text-indigo-900">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </a>
                    <a href="{{ $question->url()->edit() }}" class="text-indigo-500 hover:text-indigo-900 px-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </a>
                    <livewire:components.delete-modal wire:key="{{'question-delete-button-'.$question->id}}" :model="$question">
                        <button wire:click="$emit('confirmDeletion', {{ $question }})" class="text-red-500 hover:text-red-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </livewire:components.delete-modal>
                </div>
            </td>
        </tr>
    @endforeach
@endsection
@section('links')
    {{ $questions->links() }}
@endsection
