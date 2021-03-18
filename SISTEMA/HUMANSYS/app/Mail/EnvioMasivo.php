<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMasivo extends Mailable
{
    use Queueable, SerializesModels;
    public $prueba;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->prueba= $prueba;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
