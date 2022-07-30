<?php

namespace App\Http\Controllers;

use App\Models\Bilan_hebdo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BilanHebdoController extends Controller
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
    public function verifier()
    {
        $now = Carbon::today();
        $weekStartDate = $now->startOfWeek()->format('Y/m/d');
        $weekEndDate = $now->endOfWeek()->format('Y/m/d');
        $check = Bilan_hebdo::whereBetween('date_hebdo', [$weekStartDate, $weekEndDate])->get();
        if ($check->count() >= 1) return true;
        else return false;
    }
    public function store(Request $req)
    {
        $check = $this->verifier();
        if ($check) {
            return false;
        } else {

            $newBilan = new Bilan_hebdo();
            $newBilan->nutrition = $req->nutrition;
            $newBilan->entrainement = $req->entrainement;
            $newBilan->sensation = $req->sensation;
            $newBilan->date_hebdo = $req->date;
            $newBilan->id_client = $req->id_client;
            $newBilan->save();
            return true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bilan_hebdo  $bilan_hebdo
     * @return \Illuminate\Http\Response
     */
    public function show(Bilan_hebdo $bilan_hebdo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bilan_hebdo  $bilan_hebdo
     * @return \Illuminate\Http\Response
     */
    public function edit(Bilan_hebdo $bilan_hebdo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bilan_hebdo  $bilan_hebdo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bilan_hebdo $bilan_hebdo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bilan_hebdo  $bilan_hebdo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bilan_hebdo $bilan_hebdo)
    {
        //
    }
}
