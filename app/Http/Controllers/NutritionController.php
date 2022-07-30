<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\DB;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function getNutritioByCoach($id)
    // {
    //     return DB::table('nutrition')->select('id', 'name')->where('id_coach', $id)->get();
    // }
    public function index($id)
    {
        return Nutrition::all()->where('id_coach', $id);
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
        $existingNutrition = new Nutrition();
        $existingNutrition->name = $request['name'];
        $existingNutrition->calorie = $request['calorie'];
        $existingNutrition->glucide = $request['glucide'];
        $existingNutrition->protein = $request['protein'];
        $existingNutrition->id_coach = $request['id_coach'];
        $existingNutrition->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Nutrition::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingNutrition = Nutrition::findOrFail($id);
        $existingNutrition->name = $request['name'];
        $existingNutrition->calorie = $request['calorie'];
        $existingNutrition->glucide = $request['glucide'];
        $existingNutrition->protein = $request['protein'];
        $existingNutrition->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingNutrition = Nutrition::findOrFail($id);
        $existingNutrition->delete();
    }
}
