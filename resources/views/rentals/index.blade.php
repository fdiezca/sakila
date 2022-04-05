<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar información alquileres') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<div id="tamaño" width="200px" height="200px">
    <div class="py-12" style="height: 10%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <canvas id="myChart2" width="200" height="200"></canvas>

                </div>
            </div>
        </div>
    </div>


</div>

<script>
    const ctx = document.getElementById('myChart2').getContext('2d');

        const myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
            datasets: [{
            label: 'Alquileres por meses',
            data: <?php echo json_encode($meses); ?>,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(185, 255, 20, 0.2)',
            'rgba(125, 50, 100, 0.2)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 150, 64, 1)',
            'rgba(255, 200, 50, 1)',
            'rgba(25, 205, 88, 1)'
            ],
            borderWidth: 3
        }]
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




</x-app-layout>








