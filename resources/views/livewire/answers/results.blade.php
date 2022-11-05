<div class="flex items-center justify-center h-screen">
    <script src="https://cdn.tailwindcss.com"></script>
    <div>
        <div class="flex flex-col items-center space-y-2">
            <x-icons.success></x-icons.success>
            <h1 class="text-4xl font-bold">{{ '¡Hecho!' }}</h1>
            <p>{{ 'Gracias por completar la encuesta, tus resultados serán revisados.' }}</p>
            <a href="{{ route('answers.create', $surveyId) }}" class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
                <x-icons.back></x-icons.back>
                <span class="text-sm font-medium">{{ __('Go Home') }}</span>
            </a>
        </div>
    </div>
</div>
