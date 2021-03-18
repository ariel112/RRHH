<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Mail\Receiver;

class EnvioMasivo extends Mailable
{
    use Queueable, SerializesModels;
    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user; 
    }



        /* Mail::to("yefryyo@gmail.com")->send(new EnvioMasivo("email")); */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
        return $this->view('envio_masivo');
    }
}
