<?php

namespace App\Http\Controllers;

use App\Models\Suivre_entrainement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuivreEntrainementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $date)
    {
        return DB::table("suivre_entrainements")
            ->join('entrainements', 'entrainements.id', '=', 'suivre_entrainements.id_entrainement')
            ->where('suivre_entrainements.id_client', $id)
            ->where('suivre_entrainements.date', "=", $date)
            ->get();
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
    public function storeEnt(Request $request)
    {
        $l = count($request->all());
        $duppliquer = $request[$l - 1][0]["duppliquer"];
        $next_week = strtotime('next week');
        $firstday = date("Y-m-d", strtotime('monday', $next_week));
        $secondday = date("Y-m-d", strtotime('tuesday', $next_week));
        $thirdday = date("Y-m-d", strtotime('wednesday', $next_week));
        $fourthday = date("Y-m-d", strtotime('thursday', $next_week));
        $fifthday = date("Y-m-d", strtotime('friday', $next_week));
        $sixthday = date("Y-m-d", strtotime('saturday', $next_week));
        $dates = array($firstday, $secondday, $thirdday, $fourthday, $fifthday, $sixthday);
        $i = 0;
        foreach ($request->all() as $req) {

            foreach ($req as $r) {
                if ($r["id"] == null) {
                } else {
                    $newEnt = new Suivre_entrainement();
                    $newEnt->date = $dates[$i];
                    $newEnt->serie = $r["serie"];
                    $newEnt->temps_repos = $r["temps"];
                    $newEnt->id_entrainement = $r["id"];
                    $newEnt->id_client = $r["id_client"];
                    $newEnt->duppliquer = $duppliquer;
                    // dd($newEnt);
                    $newEnt->save();
                }
            }
            ++$i;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suivre_entrainement  $suivre_entrainement
     * @return \Illuminate\Http\Response
     */
    public function show(Suivre_entrainement $suivre_entrainement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suivre_entrainement  $suivre_entrainement
     * @return \Illuminate\Http\Response
     */
    public function edit(Suivre_entrainement $suivre_entrainement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suivre_entrainement  $suivre_entrainement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suivre_entrainement $suivre_entrainement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suivre_entrainement  $suivre_entrainement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suivre_entrainement $suivre_entrainement)
    {
        //
    }
}
