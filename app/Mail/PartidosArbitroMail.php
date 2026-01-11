<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PartidosArbitroMail extends Mailable
{
    public $arbitro;
    public $partidos;

    public function __construct($arbitro, $partidos)
    {
        $this->arbitro = $arbitro;
        $this->partidos = $partidos;
    }

    public function build()
    {
        return $this->subject('Partidos asignados')
            ->markdown('emails.partidos-arbitro');
    }
}
