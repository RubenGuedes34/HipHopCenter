<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Musica;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function homepage(){
        $albuns= Album::all();
        
        return view("homepage", compact('albuns'));
    }
    public function search(){
        $albuns= Album::all();
        $artists= Artist::all();
        $musicas= Musica::all();
        
        return view("search", compact('albuns','artists','musicas'));
    }

    public function artistas(){
        $artists= Artist::all();
        
        return view("artistas", compact('artists'));
    }

    public function ajax(){
        return Artist::all();
    }

}
