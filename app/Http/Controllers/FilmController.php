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

class FilmController extends Controller
{


    public function index()

    {

        $rentals_consulta =  "with tabla_intermedia
        as(select film.title as title, count(rental.rental_date) as alquileres, month(rental.rental_date) as mes, row_number()
        over(partition by month(rental.rental_date)
        order by count(rental.rental_date) desc) alq
        from film
                inner join inventory
                on film.film_id = inventory.film_id
                inner join rental
                on inventory.inventory_id = rental.inventory_id
                group by film.title, mes)
                select title, alquileres, mes
                from tabla_intermedia
                where alq <=10;";


        $sql = DB::select($rentals_consulta);


        //dd($sql);



        $mes_pelicula=[];
        $peliculas=[];
        $i=0;
        $mes_temp=[];
        $alq_temp=[];
        foreach ($sql as $dato){
            if ($i<10) {
                     //array_push($mes_pelicula, $dato->title);
               array_push($mes_temp, $dato->alquileres);
               array_push($alq_temp, $dato->title);
               $i++;
            } else {
                $i=0;
                array_push($mes_pelicula, $mes_temp);
                array_push($peliculas, $alq_temp);
                $mes_temp=[];
                $alq_temp=[];
            }

        }

        //dd($peliculas);

        return view('films.index')
        ->with('mes_pelicula', $mes_pelicula)
        ->with('peliculas', $peliculas);

    }

    public function create()

    {
        $categorys = Category::all();

        return view('films.create')
        ->with('categorys', $categorys);
    }

    public function graficoCrear()

    {
        $categorias= Category::all();

        $genero = $_POST['category_id'];


        $generos_consulta =  "select category.name, count(film_category.category_id) as cantidad, year(rental.rental_date) as año, month(rental.rental_date) as mes from film
        inner join film_category
        on film.film_id = film_category.film_id
        inner join category
        on film_category.category_id = category.category_id
        inner join inventory
        on film.film_id = inventory.inventory_id
        inner join rental
        on inventory.inventory_id = rental.inventory_id
        where category.category_id = ".$genero." and year(rental.rental_date)='2005'
        group by category.name;";


        $sql = DB::select($generos_consulta);


        dd($sql);



        $cantidad=[];
        $meses=[];

        foreach ($sql as $dato){

                     //array_push($mes_pelicula, $dato->title);
               array_push($cantidad, $dato->cantidad);
               array_push($meses, $dato->mes);

        }



        return view('films.genero')
        ->with('cantidad', $cantidad)
        ->with('meses', $meses)
        ->with('categorias', $categorias);

    }







    /*public function store(Request $request)

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




        return redirect()->route('films.index')
        ->with('mes_pelicula', $mes_pelicula)
        ->with('peliculas', $peliculas)
        ->with('sql', $sql);
    }*/




}

