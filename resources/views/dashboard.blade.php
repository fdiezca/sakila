<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-primary" href="{{ route('films.create') }}" title="Añadir">Crear gráfico</a>
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-primary" href="/alquilers" title="alquiler">Alquileres por meses gráfico</a>
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-primary" href="/films" title="mes">Peliculas alquiladas de cada mes gráfico</a>
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-primary" href="/citys" title="zona">Alquileres por zona gráfico</a>
        </h2>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenido a sakila!
                </div>
            </div>
        </div>
    </div>







</x-app-layout>
