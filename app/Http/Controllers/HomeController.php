<?php

namespace App\Http\Controllers;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
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

    public function music(){
        $albuns= Album::all();
        $artists= Artist::all();
        $musicas= Musica::all();
        $playlists = Playlist::all();
        return view("yourmusic", compact('albuns','artists','musicas','playlists'));
    }

    public function artistas(){
        $artists= Artist::all();
        
        return view("artistas", compact('artists'))->with([
            'artists' => Artist::paginate(5,['*'],'artists')
         ]);
    }

    public function pagamentos(){
        return view("pagamentos");
    }

    public function ajax(){
        return Artist::all();
    }

}