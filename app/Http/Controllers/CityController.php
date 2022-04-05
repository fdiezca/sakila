<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\ActorInfo;
use App\Models\Address;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerList;
use App\Models\Film;
use App\Models\FilmActor;
use App\Models\FilmCategory;
use App\Models\FilmList;
use App\Models\FilmText;
use App\Models\Iventory;
use App\Models\Language;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()

    {
        $rentals_consulta =  "select count(rental.rental_date) as cantidad_alquileres, city.city as zona from rental
        inner join customer
        on rental.customer_id = customer.customer_id
        inner join address
        on customer.address_id = address.address_id
        inner join city
        on address.city_id = city.city_id
        group by city.city
        limit 10;";


        $sql = DB::select($rentals_consulta);


        //dd($sql);



        $zona_pelicula=[];
        $zonas=[];


        foreach ($sql as $dato){


               //array_push($mes_pelicula, $dato->title);
               array_push($zona_pelicula, $dato->cantidad_alquileres);
               array_push($zonas, $dato->zona);

        }



        return view('citys.index')
        ->with('zona_pelicula', $zona_pelicula)
        ->with('zonas', $zonas);
    }
}
