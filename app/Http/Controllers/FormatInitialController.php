<?php

namespace App\Http\Controllers;

use App\Models\Format_initial;
use Illuminate\Http\Request;

class FormatInitialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Format_initial::all();
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
        $f = new Format_initial();
        $f->poid_initial = $req->poid;
        $f->taille_initial = $req->taille;
        $f->poitrine_initial = $req->poitrin;
        $f->bras_initial = $req->bra;
        $f->cuisse_initial = $req->cuisse;
        $f->id_client = $req->id_client;
        $f->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Format_initial  $format_initial
     * @return \Illuminate\Http\Response
     */
    public function show(Format_initial $format_initial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Format_initial  $format_initial
     * @return \Illuminate\Http\Response
     */
    public function edit(Format_initial $format_initial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Format_initial  $format_initial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Format_initial $format_initial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Format_initial  $format_initial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Format_initial $format_initial)
    {
        //
    }
}
