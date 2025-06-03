<?php

namespace App\Mail;

use App\Alumno;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bienvenida extends Mailable
{
    use Queueable, SerializesModels;

    private $alumno;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.bienvenida', [
            'alumno' => $this->alumno
        ]);
    }
}
