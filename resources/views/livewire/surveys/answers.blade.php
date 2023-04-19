<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="label">
        <a class="text-indigo-400 hover:text-indigo-600" href="{{ $survey->url()->participants() }}">
            {{ __('Participants') }}
        </a>
        <span class="mx-5">></span>
        <span>{{ $participant->document }}</span>
    </x-slot>
    <x-slot name="fields">
        <canvas id="myChart" width="400" height="auto"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($dimensionNames),
                    datasets: [
                        {
                            label: 'Puntaje mínimo',
                            data: @json($dimensionMinScores),
                            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                            borderColor: ['rgba(255, 99, 132, 1)'],
                            borderWidth: 1
                        },
                        {
                            label: 'Puntaje obtenido',
                            data: @json($dimensionObtainedScores),
                            backgroundColor: ['rgba(255, 206, 86, 0.2)'],
                            borderColor: ['rgba(255, 206, 86, 1)'],
                            borderWidth: 1
                        },
                        {
                            label: 'Puntaje máximo',
                            data: @json($dimensionMaxScores),
                            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                            borderColor: ['rgba(54, 162, 235, 1)'],
                            borderWidth: 1
                        },
                    ]
                }
            });
        </script>
            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">Dimensión</th>
                    <th scope="col" class="px-6 py-3">Definición</th>
                    <th scope="col" class="px-6 py-3">Pregunta</th>
                    <th scope="col" class="px-6 py-3">Bajo (1-2)</th>
                    <th scope="col" class="px-6 py-3">Medio (3)</th>
                    <th scope="col" class="px-6 py-3">Alto (4-5)</th>
                </tr>
                </thead>
                <tbody class="border-2">
                @foreach($dimensions as $dimension)
                    <tr class="text-center border-2">
                        <td rowspan="{{ $dimension->answers->count() + 1 }}">{{ $dimension->name }}</td>
                        <td rowspan="{{ $dimension->answers->count() + 1 }}">Se manifiesta</td>
                    </tr>
                    @php
                        $low = 0;
                        $middle = 0;
                        $high = 0;
                    @endphp
                    @foreach($dimension->answers as $answer)
                        <tr class="">
                            <td class="text-center border-2">{{ $answer->question->number }}.</td>
                            <td class="text-center border-2">
                                @if($answer->value < 3) X @php $low++ @endphp @endif
                            </td>
                            <td class="text-center border-2">
                                @if($answer->value == 3) X @php $middle++ @endphp @endif
                            </td>
                            <td class="text-center border-2">
                                @if($answer->value > 3) X @php $high++ @endphp @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr class="text-center border-2 bg-gray-50">
                        <td colspan="3">PROMEDIO</td>
                        <td>{{ $low }}</td>
                        <td>{{ $middle }}</td>
                        <td>{{ $high }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </x-slot>
</x-show>
