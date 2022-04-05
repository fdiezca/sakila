<?php

namespace App\Http\Controllers;
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



use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class SakilaController extends Controller
{
    public function index()
    {


       $datos_consulta = "select count(rental.rental_date) as veces_alquilado, month(rental.rental_date) as mes from rental
        where month(rental.rental_date) between month('2005/01/01') and month('2005/08/30')
        group by month(rental.rental_date), month(rental.rental_date);";



        $sql = DB::select($datos_consulta);

        //dd($sql);


        $i=0;

        $meses=[];

        foreach ($sql as $dato){

            if(($dato->mes)-1==$i){

                array_push($meses, $dato->veces_alquilado);

            }
            else{

               while ($i<(($dato->mes)-1)){

                   array_push($meses, 0);
                   $i++;
               }
               array_push($meses, $dato->veces_alquilado);

            }
            $i++;
        }


        return view('rentals.index')
        ->with('meses', $meses)
        ->with('sql', $sql);
    }

    public function show(Actor $actor)

    {
        $id=$actor->actor_id;

        $actors= Actor::find($id);
        //dd($actors);

        //$films= $actors->films()->get();

        //dd($films);
        return view('actors.show')
        ->with('actors', $actors);
    }


    public function create(Rental $rental)

    {
        $rentals = Rental::all();

        return view('dashboard')
        ->with('rentals', $rentals)
        ->with('rental', $rental);
    }

    public function store(Request $request)

    {

        $rentals = Rental::find($request->id);

        //$fecha_inicio=$request->start;

        //$fecha_fin=$request->end;



        $rentals_consulta =  "select film.title, count(rental.rental_date) as alquileres, month(rental.rental_date) as mes from film
        inner join inventory
        on film.film_id = inventory.film_id
        inner join rental
        on inventory.inventory_id = rental.inventory_id
        group by film.title;";


        $sql = DB::select($rentals_consulta);

        //dd($sql);


        $i=0;

        $mes_pelicula=[];
        $peliculas=[];

        foreach ($sql as $dato){

            if(($dato->mes)-1==$i){

                array_push($mes_pelicula, $dato->alquileres);
                array_push($peliculas, $dato->title);

            }
            else{

               while ($i<(($dato->mes)-1)){

                   array_push($mes_pelicula, 0);
                   $i++;
               }
               array_push($mes_pelicula, $dato->alquileres);
               array_push($peliculas, $dato->title);

            }
            $i++;
        }




        return redirect()->route('film.index')
        ->with('mes_pelicula', $mes_pelicula)
        ->with('sql', $sql);
    }




}
