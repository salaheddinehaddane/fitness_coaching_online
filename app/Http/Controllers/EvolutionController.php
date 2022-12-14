<?php

namespace App\Http\Controllers;

use App\Models\Evolution;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $newEvolution = new Evolution();
        $newEvolution->poid_evolution = $req->poid;
        $newEvolution->taille_evolution = $req->taille;
        $newEvolution->poitrine_evolution = $req->poitrin;
        $newEvolution->bras_evolution = $req->bra;
        $newEvolution->cuisse_evolution = $req->cuisse;
        $newEvolution->date_evolution = $req->date;
        $newEvolution->id_client = $req->id_client;
        $newEvolution->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function show(Evolution $evolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function edit(Evolution $evolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evolution $evolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evolution  $evolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evolution $evolution)
    {
        //
    }
}
