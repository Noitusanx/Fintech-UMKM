@extends('layouts.admin_page')
@section('title', 'Fintech')

@section('content')
<main>
    <div class="px-4 pt-6">
        <div class="border-2 border-dashed rounded-lg border-gray-700">
            <div class="mx-auto grid xl:grid-cols-2 md:p-6 p-4 2xl:p-10 gap-x-4">
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl text-gray-700 border border-blue-gray-100 shadow-sm bg-white mb-3">
                    <div
                        class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr bg-gray-700 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased text-sm leading-normal font-normal text-gray-900">
                            Finansial
                        </p>
                        <h4 class="block antialiased tracking-normal text-2xl font-semibold leading-snug text-gray-900">
                            Rp. {{number_format($totalKeseluruhan, 0, ',', '.')}}</h4>
                    </div>
                </div>
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl text-gray-700 border border-blue-gray-100 shadow-sm bg-white">
                    <div
                        class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr bg-gray-700 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased text-sm leading-normal font-normal text-gray-900">
                            Jumlah Produk</p>
                        <h4 class="block antialiased tracking-normal text-2xl font-semibold leading-snug text-gray-900">
                            {{$jumlahProduk}}</h4>
                    </div>
                </div>
            </div>
            <div
                class="col-span-12 rounded-sm border border-stroke bg-white px-12 py-4 shadow-default sm:px-7.5 xl:col-span-8 mx-6 mb-6">
                <div>
                    <div id="chartOne" style="min-height: 365px;">
                        <h1 class="text-gray-900 text-2xl text-center font-semibold">
                            Statistik
                            Finansial</h1>
                        <div class="mt-4">
                            <canvas id="myChart" class="w-full "></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var financialData = {!! json_encode($financialData) !!};

    // Parse dates and sort the data based on the date
    financialData.sort(function (a, b) {
        return new Date(a.tanggal) - new Date(b.tanggal);
    });

    var dates = financialData.map(function (item) {
        // Format date to 'dd-mm-yyyy'
        return new Intl.DateTimeFormat('en-GB').format(new Date(item.tanggal));
    });

    var totalKeuangan = financialData.map(function (item) {
        return item.totalKeuangan;
    });

    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Total Keseluruhan',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: totalKeuangan
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time', // Use time scale for dates
                    time: {
                        unit: 'day', // Display by day
                        displayFormats: {
                            day: 'DD-MM-YYYY' // Format 'dd-mm-yyyy'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'Total Keuangan'
                    },
                    ticks: {
                        stepSize: 1000000,
                        callback: function (value, index, values) {
                            return new Intl.NumberFormat().format(value);
                        }
                    }
                }
            },
            legend: {
                display: false
            }
        }
    });
});
</script>