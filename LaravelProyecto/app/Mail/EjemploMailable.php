<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EjemploMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $texto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($texto)
    {
        $this->texto = $texto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ejemplo Mailable')
                    ->view('emails.ejemplo')
                    ->with('texto', $this->texto);
    }
}
