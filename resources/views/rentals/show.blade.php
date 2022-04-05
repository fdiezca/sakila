<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar información Actores') }}
        </h2>
    </x-slot>


    {{--<ul>
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



</x-app-layout>








