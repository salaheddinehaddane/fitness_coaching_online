<?php

namespace App\Http\Controllers;

use App\Models\Payement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id_coach,$id_abonnement)
    {
        $now = strtotime(date("Y/m/d"));

        $p = new Payement();
        $p->date_debut = $now;
        if($id_abonnement == 1){
            $endDay = date("Y-m-d", strtotime("+1 month", $now));
            $p->date_end = $endDay;
        }
        else if($id_abonnement == 2){
            $endDay = date("Y-m-d", strtotime("+6 month", $now));
            $p->date_end = $endDay;
        }else if($id_abonnement == 3){
            $endDay = date("Y-m-d", strtotime("+12 month", $now));
            $p->date_end = $endDay;
        }
        $p->id_abonnement = $id_abonnement;
        $p->id_coach = $id_coach;
        $p->save();
    }

    public function email(){
        $a=array();
       $diff= DB::table('payement_clients')
        ->select('DB::raw("DATEDIFF(payements.date_fin, CURDATE())")')->get();

        if($diff==15){

        }else if($diff == 7){

        }
        else if($diff < 7 && $diff >0){

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function show(Payement $payement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function edit(Payement $payement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payement $payement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payement  $payement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payement $payement)
    {
        //
    }
}
