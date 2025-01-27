<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class BuscarOfertasCaducadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:buscar-ofertas-caducadas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borra las ofertas que ya no tengan validez';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user){
            foreach($user->ofertas as $inmueble){
                if ($user->pivot->fecha_vencimiento<Carbon::now()){
                    $user->ofertas()->detach($inmueble);
                }
            }
        }
        Log::log('info',$user->ofertas);
    }
}
