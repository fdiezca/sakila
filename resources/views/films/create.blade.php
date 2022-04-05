<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sakila') }}

        </h2>
    </x-slot>



<div class="code-preview rounded-xl bg-gradient-to-r bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-2 sm:p-6">
    <h2>Generos cantidad</h2>

    <div date-rangepicker class="flex items-center">
        <form action="{{ route('film.grafico') }}" method="POST" >
        <select name="generos" id="">
            @foreach ($categorys as $cat)

            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Actualizar</button>
        </form>
    </div>

</div>






</x-app-layout>
