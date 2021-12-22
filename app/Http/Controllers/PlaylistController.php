<?php

namespace App\Http\Controllers;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $albuns = Album::all();
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists','albuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlists.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'id_artista' => 'required',
            'Likes' => 'required',
        ]);

        Playlist::create($request->all());

        return redirect()->route('albuns.index')
            ->with('success', 'Album created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return view('playlists.show', compact('playlist'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', compact('playlist'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        $playlist->update($request->all());

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist updated successfully');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlist.index')
            ->with('success', 'Playlist deleted successfully');
    }
}
