<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Client;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class loginsController extends Controller
{
    public function login(Request $req)
    {
        // dd($req->email);
        $client = DB::table('clients')
            ->select('id', 'name')
            ->where('email', $req->email)
            ->where('password', md5($req->password))
            ->where('pending', '<>', 0)
            ->get();
        $a = new DateTime("now");
        $now = $a->format('Y-m-d');
        $coach = DB::table('coaches')
            ->select('coaches.id as id', 'name')
            // ->join("payements","payements.id_coach","coaches.id")
            ->where('email', $req->email)
            ->where('password', md5($req->password))
            ->where('pending', '<>', 0)
            // ->where('payements.date_fin', '>',$now)
            ->get();
        $admin = DB::table('admins')
            ->select('id', 'name')
            ->where('email', $req->email)
            ->where('password', md5($req->password))
            ->get();
        // dd($client->count() . ' ' . $client);
        if ($client->count()) {
            $data = json_decode($client, true);
            $data[0]['role'] = 'client';
            $json = json_encode($data);
            return $json;
        } else if ($coach->count()) {
            $data = json_decode($coach, true);
            $id_coach = $data[0]['id'];
            $check = DB::table("payements")
                ->select("*")
                ->where("payements.id_coach", $id_coach)
                ->where("payements.date_fin", ">", $now)
                ->get()->count();
            if ($check) {
                $data[0]['abonnement'] = 'valide';
            }
            $data[0]['role'] = 'coach';
            $json = json_encode($data);
            return $json;
        } else if ($admin->count()) {
            $data = json_decode($admin, true);
            $data[0]['role'] = 'admin';
            $json = json_encode($data);
            return $json;
        }

        return redirect()->route('home');
    }
}
