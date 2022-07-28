<div>
    @foreach($availableLocales as $localeName => $availableLocale)
        @if ($availableLocale !== $currentLocale)
            <x-jet-dropdown-link href="{{ route('locale.update', $availableLocale) }}">
                {{ __($localeName) }}
            </x-jet-dropdown-link>
        @endif
    @endforeach
</div>
