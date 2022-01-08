<?php

namespace App\Http\Controllers;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Models\Playlist;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cache;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
       $this->middleware(['auth','verified']);
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

    public function updateUsername(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
        ]);
        $user->update([
            'name' => $request['name'],
            
        ]);

        return redirect()->route('userDetails')
            ->with('success', 'User updated successfully');
    }
    public function updatePassword(Request $request, User $user){
        $request->validate([
          
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
        $user->update([
           
            'password' =>Hash::make($request['password']),
        ]);

        return redirect()->route('userDetails')
        ->with('success', 'User updated successfully');
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

    public function receive_pagamentos(){
        return view("receive_pagamentos");
    }
   

    public function ajax(){
        return Artist::all();
    }

    public function settings(){
        return view("settings");
    }

    public function userDetails(){
        return view("userDetails");
    }
}