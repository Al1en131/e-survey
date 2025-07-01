<x-admin-layout>
    <div class="">
        <div class="items-center mb-6 max-md:mb-4 max-md:contents hidden">
            <div class="flex items-center">
                <div class="rounded-lg bg-primary p-[5px]">
                    <a class="" href="{{ route('admin.answer.index') }}">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </a>
                </div>
                <h1 class="text-2xl text-secondary font-semibold pb-2 max-md:text-lg max-md:pb-0">
                    Chart Data
                </h1>

            </div>
            <div class="font-agrandir">
                <h5 class="text-lg text-secondary max-md:text-base my-2 mb-6">{{ $survey->title }}</h5>
            </div>
        </div>
        <div class=" mb-6 max-md:mb-4 max-md:hidden">
            <div class="font-agrandir">
                <div class="flex justify-between items-center">
                    <h1 class=" text-4xl text-secondary font-medium pb-2 max-md:text-lg max-md:pb-0">Chart
                        Data
                    </h1>
                    <div class="flex items-center justify-end">

                        <div class="rounded-lg bg-primary p-2">
                            <a class="" href="{{ route('admin.answer.index') }}">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-8 pr-4 bg-primary flex items-center gap-3 rounded-lg">
            <div class="flex items-center">
                <img src="/assets/image/people-4.png" alt="People Icon" class="w-64 h-64 object-cover rounded-full" />
            </div>
            <div class="text-white">
                <h2 class="text-xl font-semibold mb-2">{{ $survey->title }}</h2>
                <p class="text-sm leading-relaxed max-w-2xl">
                    {{ $survey->description }}
                </p>
            </div>
        </div>
        @foreach ($chartData as $index => $item)
            <div class="my-8 p-4 border-2 border-primary shadow rounded-md">
                <p class="text-sm text-gray-500 mb-1">Pertanyaan {{ $index + 1 }} ({{ ucfirst($item['type']) }})</p>
                <h4 class="text-lg mb-4 text-black">{{ $item['question'] }}</h4>

                @if ($item['type'] === 'essay')
                    <div class="space-y-3">
                        @forelse ($item['data'] as $answer)
                            <div class="p-4 bg-gray-100 border border-primary rounded-md text-sm text-gray-700 shadow">
                                {{ $answer }}
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 italic">Belum ada jawaban</p>
                        @endforelse
                    </div>
                @else
                    <div class="w-full overflow-x-auto">
                        <canvas id="chart-{{ $index }}" class="w-full h-[300px]"></canvas>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        const chartData = @json($chartData);

        chartData.forEach((item, index) => {
            const ctx = document.getElementById(`chart-${index}`).getContext('2d');
            const values = item.type === 'likert' ?
                item.labels.map(label => item.data[label] ?? 0) :
                Object.values(item.data);
            const labels = item.type === 'likert' ?
                item.labels // ini isinya ['1', '2', '3', '4', '5']
                :
                Object.keys(item.data);


            const total = values.reduce((a, b) => a + b, 0);


            const colors = [
                '#395886', '#6283af', '#243a55', '#49639e',
                '#b0c4de', '#5d7290', '#3abff8', '#304e78'
            ];
            const backgroundColors = labels.map((_, i) => colors[i % colors.length]);

            new Chart(ctx, {
                type: item.type === 'likert' ? 'bar' : 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Jawaban',
                        data: values,
                        backgroundColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: item.type === 'bar' ? 'white' : 'black',
                            anchor: 'center',
                            align: 'center',
                            formatter: (value) => {
                                const percent = ((value / total) * 100).toFixed(1);
                                return `${value} (${percent}%)`;
                            },
                            font: {
                                weight: 'bold',
                                size: 12,
                            },
                            color: 'white' // ⬅️ ini yang akan menentukan warna teks
                        },
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const val = context.raw;
                                    const percent = ((val / total) * 100).toFixed(1);
                                    return `${val} jawaban (${percent}%)`;
                                }
                            }
                        }
                    },
                    scales: item.type === 'likert' ? {
                        x: {
                            title: {
                                display: true,
                                text: 'Skala Likert'
                            },
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Responden'
                            }
                        }
                    } : {}



                },
                plugins: [ChartDataLabels]
            });
        });
    </script>

</x-admin-layout>
