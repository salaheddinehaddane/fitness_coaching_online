<?php

namespace App\Http\Controllers;

use App\Models\Entrainement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntrainementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEntrainementByCoach($id)
    {
        return DB::table('entrainements')->select('id', 'name')->where('id_coach', $id)->get();
    }
    public function index($id)
    {
        return DB::table('entrainements')->select('*')->where('id_coach', $id)->get();
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
    public function store(Request $request)
    {
        $new_entrainement = new Entrainement();
        $new_entrainement->name = $request['name'];
        $new_entrainement->cible = $request['cible'];
        $new_entrainement->type = $request['type'];
        $new_entrainement->id_coach = $request['id_coach'];
        $new_entrainement->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrainement  $entrainement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Entrainement::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrainement  $entrainement
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrainement $entrainement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrainement  $entrainement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingEntrainement = Entrainement::findOrFail($id);
        $existingEntrainement->name = $request["name"];
        $existingEntrainement->cible = $request["cible"];
        $existingEntrainement->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrainement  $entrainement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('entrainements')->select('*')->where('id', $id)->delete();
    }
}
