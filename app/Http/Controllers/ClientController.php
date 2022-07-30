<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coach;
use App\Models\Payement;
use App\Models\Payement_client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // fetch if the user exist
    // generate a random password of 8 caracter
    // crypte it with md5 and insert it
    //Send password via email to user and ask him/her to change it after his/her connection
    public function motPasse($email)
    {
        $client = DB::table('clients')->where("email", $email)->get();
        $coach = DB::table('coaches')->where("email", $email)->get();
        $pwd = bin2hex(openssl_random_pseudo_bytes(4));
        if ($client->count()) {
            Mail::raw("Bonjour {$client[0]->name}, voici votre mot de passe : {$pwd} \nSans oublié de changer le mot de passe", function ($mail) use ($client) {
                $mail->from('salahhaddane@gmail.com');
                $mail->to($client[0]->email)
                    ->subject('Initialisation de votre mot de passe');
            });
            $c = Client::find($client[0]->id);
            $c->password = md5($pwd);
            $c->save();
            return 1;
        }
        if ($coach->count()) {
            Mail::raw("Bonjour {$coach[0]->name}, voici votre mot de passe : {$pwd} \nSans oublié de changer le mot de passe", function ($mail) use ($coach) {
                $mail->from('salahhaddane@gmail.com');
                $mail->to($coach[0]->email)
                    ->subject('Initialisation de votre mot de passe');
            });
            $c = Coach::find($coach[0]->id);
            $c->password = md5($pwd);
            $c->save();
            return 1;
        }
        return 0;
    }
    public function valider($id, $id_abonnement)
    {

        // $client->save();

        $a = new DateTime("now");
        $now = $a->format('Y-m-d');

        $client = Client::find($id);
        $client->pending = 1;


        $p = new Payement_client();
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
        $p->id_client = $id;
        $p->save();
        $client->save();
    }
    public function clients()
    {
        return DB::table("clients")->select("clients.id as id", "clients.name as nameCl", "coaches.name as nameCo")
            ->join("coaches", "clients.id_coach", "coaches.id")
            ->where("clients.pending", "1")
            ->get();
    }
    public function pending($id)
    {
        return DB::table("clients")->select("*")
            ->where("clients.pending", 0)
            ->where("clients.id_coach", $id)
            ->get();
    }
    public function pending2($id)
    {
        return DB::table("clients")->select("*")
            ->join("format_initials", "format_initials.id_client", "clients.id")
            ->join("format_cibles", "format_cibles.id_cible", "clients.id_cible")
            ->where("clients.pending", 0)
            ->where("clients.id", $id)
            ->get();
    }
    // public function valider($id)
    // {
    //     // $client = Client::fiendOrfail($id);
    //     // $client->pending = 1;
    //     // $client->save();
    //     Client::where('id', $id)->update(['pending' => '1']);
    // }
    public function getCoach($id)
    {
        return DB::table("clients")->select("clients.id as id", "clients.name as nameCl", "coaches.name as nameCo")
            ->where("clients.id_coach", $id)
            ->join("coaches", "clients.id_coach", "coaches.id")
            ->where("clients.pending", 1)
            ->get();
    }
    public function index($id)
    {
        return DB::table("clients")->where('id_coach', $id)->where("clients.pending", 1)->get();
    }
    public function getAllInfoClient($id)
    {
        $now = Carbon::today();
        $weekStartDate = $now->startOfWeek()->format('Y/m/d');
        $weekEndDate = $now->endOfWeek()->format('Y/m/d');
        return DB::table('clients')
            ->join('evolutions', 'evolutions.id_client', '=', 'clients.id')
            ->join('format_cibles', 'clients.id_cible', '=', 'format_cibles.id_cible')
            ->join('format_initials', 'format_initials.id_client', '=', 'clients.id')
            ->join('bilan_hebdos', 'clients.id', '=', 'bilan_hebdos.id_client')
            ->where('clients.id', $id)
            ->whereBetween('date_hebdo', [$weekStartDate, $weekEndDate])
            ->whereBetween('date_evolution', [$weekStartDate, $weekEndDate])
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
    public function store(Request $req)
    {
        $client = new Client();
        $client->name = $req->name;
        $client->email = $req->email;
        $client->password = md5($req->password);
        $client->No_tel = $req->No_tel;
        $client->pending = 0;
        $client->id_coach = $req->id_coach;
        $client->id_cible = $req->id_cible;
        $client->save();
        return $client->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_coach)
    {

        $client = Client::findOrFail($id_coach);
        $client->delete();
    }
}
