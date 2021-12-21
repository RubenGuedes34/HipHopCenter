<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albuns = Album::all();
        $musicas = Musica::all();
        $artistas = Artist::all();
        return view('musicas.index', compact('musicas','artistas','albuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musicas.create');
    }

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
            'path' => 'required',
            'Likes' => 'required',
            'duracao' => 'required',
            'id_artista' => 'required',
            'id_album' => 'required',
            'id_genero' => 'required',
        ]);

        Musica::create($request->all());

        return redirect()->route('musicas.index')
            ->with('success', 'Musica created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function show(Musica $musica)
    {
        return view('musicas.show', compact('musica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function edit(Musica $musica)
    {
        return view('musicas.edit', compact('musica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musica $musica)
    {
        $musica->update($request->all());

        return redirect()->route('musicas.index')
            ->with('success', 'Musica updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        $musica->delete();

        return redirect()->route('musicas.index')
            ->with('success', 'Musica deleted successfully');
    }
}
