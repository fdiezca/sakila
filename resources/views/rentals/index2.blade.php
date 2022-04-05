<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar información Actores') }}
        </h2>
    </x-slot>


   {{-- <ul>
        <strong>Idioma:</strong>
        @foreach ($idiomas as $idioma)


            <li>{{ $idioma->name}}</li>

        @endforeach

    </ul>--}}


    <table class="table table-bordered table-responsive-lg">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Pelicula</th>



    </tr>
    @foreach ($actors as $actor)
        <tr>
            <td class="efecto2" style="vertical-align: middle">{{ $actor->first_name}}</td>
            <td class="efecto2" style="vertical-align: middle">{{ $actor->last_name }}</td>

            <td>
                @foreach($actor->films as $film)
                    <ul>
                        <li>{{ $film->title}}</li>
                    </ul>
                @endforeach
            </td>

        </tr>


    @endforeach


    </table>

    {{--<ul>
    <strong>Peliculas:</strong>
    @foreach ($films as $film)


        <li>{{ $film->title}}</li>

    @endforeach

    </ul>--}}

    <div id="myChart" with="70%">
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
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
    </div>


    <div>
        <canvas id="myChart2" width="400" height="400"></canvas>
        <script>
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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
        </div>




        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</x-app-layout>








