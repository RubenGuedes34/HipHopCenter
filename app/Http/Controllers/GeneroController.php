<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generos.create');
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
           ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')
            ->with('success', 'Genero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        return view('generos.show', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {
        $genero->update($request->all());

        return redirect()->route('generos.index')
            ->with('success', 'Genero updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('generos.index')
            ->with('success', 'Genero deleted successfully');
    }
}
