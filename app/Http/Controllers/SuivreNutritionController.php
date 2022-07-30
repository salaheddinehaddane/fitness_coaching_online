<?php

namespace App\Http\Controllers;

use App\Models\Suivre_nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuivreNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pd($id,$date)
    {
        // return DB::table('suivre_nutritions')->where('repas', '1')
        // ->join('nutrition', 'nutrition.id', '=', 'suivre_nutritions.id_nutrition')
        // ->select('sum(suivre_nutrition.quantite)', 'sum(nutrition.calorie)', '*')
        // ->get();
        return DB::table('suivre_nutritions')
            ->select('*', DB::raw('suivre_nutritions.quantite*nutrition.calorie as sommeClPd'), DB::raw('suivre_nutritions.quantite*nutrition.protein as sommePrPd'), DB::raw('suivre_nutritions.quantite*nutrition.glucide as sommeGlPd'))
            ->join('nutrition', 'nutrition.id', '=', 'suivre_nutritions.id_nutrition')
            ->where("suivre_nutritions.id_client",$id)
            ->where('suivre_nutritions.date','=',$date)
            ->where('repas', '1')->get();
        // ->SUM('suivre_nutritions.quantite', '*', 'nutrition.calorie');
        // Requete:
        // select * ,sum(quantite*calorie) as somme from nutrition
        // inner join suivre_nutritions
        // on nutrition.id = suivre_nutritions.id_nutrition
        // where repas=1;
        // return DB::select(DB::raw('select * ,sum(quantite*calorie) as somme from nutrition inner join suivre_nutritions on nutrition.id = suivre_nutritions.id_nutrition where repas=1;'));
    }
    public function de($id,$date)
    {
        return DB::table('suivre_nutritions')
            ->select('*', DB::raw('suivre_nutritions.quantite*nutrition.calorie as sommeClDe'), DB::raw('suivre_nutritions.quantite*nutrition.protein as sommePrDe'), DB::raw('suivre_nutritions.quantite*nutrition.glucide as sommeGlDe'))
            ->join('nutrition', 'nutrition.id', '=', 'suivre_nutritions.id_nutrition')
            ->where("suivre_nutritions.id_client",$id)
            ->where('suivre_nutritions.date','=',$date)
            ->where('repas', '2')->get();
    }
    public function di($id,$date)
    {
        return DB::table('suivre_nutritions')
            ->select('*', DB::raw('suivre_nutritions.quantite*nutrition.calorie as sommeClDi'), DB::raw('suivre_nutritions.quantite*nutrition.protein as sommePrDi'), DB::raw('suivre_nutritions.quantite*nutrition.glucide as sommeGlDi'))
            ->join('nutrition', 'nutrition.id', '=', 'suivre_nutritions.id_nutrition')
            ->where("suivre_nutritions.id_client",$id)
            ->where('suivre_nutritions.date','=',$date)
            ->where('repas', '3')->get();
    }
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
    public function store(request $request)
    {
        $l = count($request->all());
        $duppliquer = $request[$l - 1][0][0]["duppliquer"];
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

            foreach ($req as $re) {
                foreach ($re as $r) {
                    if ($r["id_nutrition"] == null) {
                    } else {
                        $newPlan = new Suivre_nutrition();
                        $newPlan->date = $dates[$i];
                        $newPlan->repas = $r["repas"];
                        $newPlan->quantite = $r["quantite"];
                        $newPlan->id_nutrition = $r["id_nutrition"];
                        $newPlan->id_client = $r["id_client"];
                        $newPlan->duppliquer = $duppliquer;
                        $newPlan->save();
                    }
                }
            }
            ++$i;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suivre_nutrition  $suivre_nutrition
     * @return \Illuminate\Http\Response
     */
    public function show(Suivre_nutrition $suivre_nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suivre_nutrition  $suivre_nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(Suivre_nutrition $suivre_nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suivre_nutrition  $suivre_nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suivre_nutrition $suivre_nutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suivre_nutrition  $suivre_nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suivre_nutrition $suivre_nutrition)
    {
        //
    }
}
