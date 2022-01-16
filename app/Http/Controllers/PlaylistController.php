<?php

namespace App\Http\Controllers;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class PlaylistController extends Controller{



    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $albuns = Album::all();
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists','albuns'))->with([
            'playlists' => Playlist::paginate(5,['*'],'playlists')
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('playlists.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createPlaylist(){
        return view('createPlaylist');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'id_user' => 'required',
            'Likes' => 'required',
        ]);

        Playlist::create($request->all());

        return redirect()->route('yourmusic')
            ->with('success', 'Playlist created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist){
        $musicas = Musica::all();
        return view('playlists.show', compact('playlist','musicas'))->with([
            'musicas' => Musica::paginate(5,['*'],'musicas')
         ]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
  
    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', compact('playlist'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist){
        $playlist->update($request->all());

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist updated successfully');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy_admin(Playlist $playlist){
        $id_playlist=$playlist->id;
        DB::table('users')
        ->where('id_lastPlaylist', $id_playlist)
        ->update(
        ['id_lastPlaylist' => null]
    );
        $playlist->delete();

        return redirect()->route('yourmusic')
            ->with('success', 'Playlist deleted successfully');
    }
    public function destroy(Playlist $playlist){
        $id_playlist=$playlist->id;
        $id_user= auth()->user()->id;
        DB::table('users')
        ->where('id', $id_user)
        ->update(
        ['id_lastPlaylist' => null]
    );
        DB::table('users')
        ->where('id_lastPlaylist', $id_playlist)
        ->update(
        ['id_lastPlaylist' => null]
    );
        $playlist->delete();

        return redirect()->route('yourmusic')
            ->with('success', 'Playlist deleted successfully');
    }

    public function play(Playlist $playlist){

    $id_playlist=$playlist->id;
    $id_user= auth()->user()->id;
    DB::table('users')
    ->where('id', $id_user)
    ->update(
        ['id_lastPlaylist' => $id_playlist]
    );

        $musicas = Musica::all();
        return view('playlists.play', compact('playlist','musicas'));    
    }
}