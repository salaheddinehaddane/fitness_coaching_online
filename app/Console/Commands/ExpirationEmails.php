<?php

namespace App\Console\Commands;

use App\Models\Payement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ExpirationEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiration7days:email';

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

        $messageOf7DaysLeft="votre abonnement sera expiré dans moins d'une semaine";


        $userEmailHas7daysLeft =
        DB::table('payements')
        ->whereRaw("DATEDIFF(payements.date_fin, payements.date_debut)<=7")
        ->whereRaw("DATEDIFF(payements.date_fin, payements.date_debut) > 0")
        ->join("coaches","coaches.id","payements.id_coach")
        // ->select('clients.email')
        ->get();


        foreach ( $userEmailHas7daysLeft as $user ){
            Mail::raw("Bonjour {$user->name} {$messageOf7DaysLeft}", function ($mail) use ($user) {
                $mail->from('salahhaddane@gmail.com');
                $mail->to($user->email)
                    ->subject('Expiration de votre abonnement : moins d\' une semaine reste');
            });
        }
    }
}
