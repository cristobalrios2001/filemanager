<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;  // Agrega esta línea para definir la propiedad $data

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;  // Asigna los datos al atributo $data
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //d($this->data);  // Agrega esta línea para verificar que los datos se están pasando correctamente
        return $this->view('emails.profile_data')
            ->with(['data' => $this->data])
            ->subject('Formulario Linea Directa');
    }
}
