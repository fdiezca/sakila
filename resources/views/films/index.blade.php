<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacion alquileres') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div id="tamaño" width="200px" height="200px">
    <div class="py-12" style="height: 10%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <canvas id="peliculas" width="200" height="200"></canvas>

                </div>
            </div>
        </div>
    </div>


</div>

<script>
const ctx = document.getElementById('peliculas').getContext('2d');

const peliculas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
        datasets: [{
        {
            label: <?php echo json_encode($peliculas[0]); ?>,
            data: <?php echo json_encode($mes_pelicula[0]); ?>,
            borderColor: Utils.CHART_COLORS.red,
            backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
        },
        {
            label: <?php echo json_encode($peliculas[1]); ?>,
            data: <?php echo json_encode($mes_pelicula[1]); ?>,
            borderColor: Utils.CHART_COLORS.blue,
            backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
        },
        {
            label: <?php echo json_encode($peliculas[2]); ?>,
            data: <?php echo json_encode($mes_pelicula[2]); ?>,
            borderColor: Utils.CHART_COLORS.blue,
            backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
        },
        {
            label: <?php echo json_encode($peliculas[3]); ?>,
            data: <?php echo json_encode($mes_pelicula[3]); ?>,
            borderColor: Utils.CHART_COLORS.blue,
            backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
        },


    ]}

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

