<x-show :model="$survey">
    <x-slot name="title">{{ __('Surveys') }}</x-slot>
    <x-slot name="label">
        <span>{{ $participant->document }}</span>
        <span class="mx-5">></span>
        <span>{{ __('Results') }}</span>
    </x-slot>
    <x-slot name="fields">
        <canvas id="myChart" width="400" height="auto"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Agresión Verbal', 'Agresión Física', 'Ira', 'Hostilidad'],
                    datasets: [
                        {
                            label: 'Puntaje mínimo',
                            data: [7,4,7,7],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Puntaje obtenido',
                            data: [19, 8, 18, 16],
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Puntaje máximo',
                            data: [35, 20, 35, 35],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </x-slot>
</x-show>
