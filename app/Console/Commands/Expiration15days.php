<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Expiration15days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiration15days:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command aims to notify the coachs of the app about expiration of their subcription';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messageOf15DaysLeft="votre abonnement sera expiré dans les 15 jours prochain";

        $userEmailHas15daysLeft = DB::table('payements')
        ->whereRaw("DATEDIFF(payements.date_fin, payements.date_debut)<=15")
        ->whereRaw("DATEDIFF(payements.date_fin, payements.date_debut) > 7")
        ->join("coaches","coaches.id","payements.id_coach")
        // ->select('clients.email')
        ->get();
        foreach ( $userEmailHas15daysLeft as $user ){
            Mail::raw("Bonjour {$user->name} {$messageOf15DaysLeft}", function ($mail) use ($user) {
                $mail->from('salahhaddane@gmail.com');
                $mail->to($user->email)
                    ->subject('Expiration de votre abonnement : 15 jours reste');
            });
        }
    }
}
