<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $artists = Artist::all();
        return view('artists.index', compact('artists'))->with([
            'artists' => Artist::paginate(5,['*'],'artists')
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required',
            'Data_de_nascimento' => 'required',
            'Likes' => 'required',
        ]);

        Artist::create($request->all());

        return redirect()->route('artists.index')
            ->with('success', 'Artist created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist){
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist){
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist){
        $artist->update($request->all());

        return redirect()->route('artists.index')
            ->with('success', 'Artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist){
        $artist->delete();

        return redirect()->route('artists.index')
            ->with('success', 'Artist deleted successfully');
    }

    /** AJAX METHOD GET ALBUMS  */
    public function getArtistJson(Request $request){
        $artistId = $request->artistId;
        $artists = Artist::where('id',$artistId)->get();
        $artists = json_decode($artists);
        return response()->json(['data'=>$artists]);
    }
}
