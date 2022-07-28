<div class="mt-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $title }}
        <div class="flex flex-col mt-5">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    {{ $header }}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __('Actions') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            @if ($footer ?? true)
                                <tfoot class="bg-gray-800 text-white">
                                <tr>
                                    {{ $header }}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __('Actions') }}</span>
                                    </th>
                                </tr>
                                </tfoot>
                            @endif
                            <tbody class="bg-white divide-y divide-gray-200" wire:sortable="updateQuestionsOrder">
                                {{ $content }}
                            </tbody>
                        </table>
                        @isset($links)
                            <div class="px-4 py-3 bg-gray-50 border-t">
                                {{ $links }}
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
