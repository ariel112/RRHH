<?php

namespace App\Mail;
use App\Models\empleado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correoPermisos extends Mailable
{
    use Queueable, SerializesModels;
    public $empleado;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(empleado $empleado)
    {
        //
        /* $receivers = Receiver::pluck('email');
    Mail::to($receivers)->send(new EmergencyCallReceived($call)); */
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('name');
    }
}
