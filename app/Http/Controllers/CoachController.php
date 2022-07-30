<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payement;
use App\Models\Coach;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return Coach::findOrFail($id);
    }
    public function index()
    {
        return DB::table("coaches")->select("coaches.*", "payements.id as id_payement", DB::raw("DATE_FORMAT(payements.date_fin,'%d/%m/%Y') AS date_fin "), DB::raw("DATE_FORMAT(payements.date_debut,'%d/%m/%Y') AS date_debut "))
            ->join('payements', "coaches.id", "payements.id_coach")
            ->where('pending', 1)
            ->get();
    }
    public function pending()
    {
        return DB::table("coaches")->select("coaches.name", "coaches.No_tel", "coaches.email", "coaches.id", "abonnements.duree", "abonnements.montant", "abonnements.id as id_abonnement")
            ->join("abonnements", "abonnements.id", "coaches.id_abonnement")
            ->where('pending', 0)
            ->get();
    }
    public function renouveler($id_coach, $id_abonnement, $id_payement)
    {
        $coach = Coach::find($id_coach);
        $coach->pending = 0;
        $coach->id_abonnement = $id_abonnement;

        $p = Payement::find($id_payement);
        $p->delete();
        $coach->save();
    }
    public function valider($id_coach, $id_abonnement)
    {
        // $now = date("Y-m-d");
        // $now2= strtotime(date("Y/m/d"));
        // $now =  date("Y/m/d", strtotime($now));
        // $endDay = date("Y-m-d", strtotime("+1 month", $now2));
        $a = new DateTime("now");
        $now = $a->format('Y-m-d');

        // dd($now." " .$endDay);
        // dd($endDay);
        $coach = Coach::find($id_coach);
        $coach->pending = 1;


        $p = new Payement();
        $p->date_debut = $now;
        // $p->date_debut = "2020/01/02";
        if ($id_abonnement == 1) {
            $next = new DateInterval("P1M");
            $aaa = $a->add($next);
            $endDay = $aaa->format("Y-m-d");
            $p->date_fin = $endDay;
        } else if ($id_abonnement == 2) {
            $next = new DateInterval("P6M");
            $aaa = $a->add($next);
            $endDay = $aaa->format("Y-m-d");
            $p->date_fin = $endDay;
        } else if ($id_abonnement == 3) {
            $next = new DateInterval("P12M");
            $aaa = $a->add($next);
            $endDay = $aaa->format("Y-m-d");
            $p->date_fin = $endDay;
        }
        $p->id_abonnement = $id_abonnement;
        $p->id_coach = $id_coach;
        $p->save();
        $coach->save();
    }
    public function getAbonnement($id)
    {
        return DB::table('coaches')
            ->join('payements', 'coaches.id', 'payements.id_coach')
            ->join('abonnements', 'payements.id_abonnement', 'abonnements.id')
            ->select('payements.id as id_payement', 'abonnements.id as id_abonnement', 'abonnements.duree', DB::raw('DATE_FORMAT(payements.date_debut, "%d/%m/%Y") AS date_debut'), DB::raw('DATE_FORMAT(payements.date_fin, "%d/%m/%Y") AS date_fin'), DB::raw("DATEDIFF(payements.date_fin, CURDATE()) AS reste"))
            ->where('coaches.id', $id)
            ->get();
    }
    public function inscrire($id)
    {
        return Coach::find($id);
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
        // dd($req->name);
        $c = new Coach();
        $c->name = $req->name;
        $c->email = $req->email;
        $c->password = md5($req->password);
        $c->No_tel = $req->No_tel;
        $c->id_abonnement = $req->id_abonnement;
        $c->pending = 0;
        $c->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_coach, $id_payement)
    {
        $payement = Payement::findOrFail($id_payement);
        $payement->delete();

        $coach = Coach::findOrFail($id_coach);
        $coach->delete();
    }
    public function destroy2($id_coach)
    {
        $coach = Coach::findOrFail($id_coach);
        $coach->delete();
    }

    public function changerMotPasse($id, $pwd, $npwd)
    {

        $client = DB::table("clients")->where("password", md5($pwd))->where("id", $id)->get();
        $coach = DB::table("coaches")->where("password", md5($pwd))->where("id", $id)->get();
        if ($client->count()) {
            $c = Client::find($id);
            $c->password = md5($npwd);
            $c->save();
            return 1;
        }
        if ($coach->count()) {
            $c = Coach::find($id);
            $c->password = md5($npwd);
            $c->save();
            return 1;
        }
        return 0;
    }
}
