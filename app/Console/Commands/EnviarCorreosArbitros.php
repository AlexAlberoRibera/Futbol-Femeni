<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Partido;
use App\Mail\PartidosArbitroMail;

class EnviarCorreosArbitros extends Command
{
    protected $signature = 'arbitros:enviar';
    protected $description = 'Enviar correos a árbitros';

    public function handle()
    {
        $arbitros = User::where('role', User::ROLE_ARBITRE)->get();

        foreach ($arbitros as $arbitro) {
            $partidos = Partido::where('arbitro_id', $arbitro->id)
                ->with(['local', 'visitante'])
                ->get();

            if ($partidos->count()) {
                Mail::to($arbitro->email)
                    ->send(new PartidosArbitroMail($arbitro, $partidos));
            }
        }

        $this->info('Correos enviados a los árbitros');
    }
}
