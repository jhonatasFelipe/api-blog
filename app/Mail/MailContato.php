<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $fixo;
    public $celular;
    public $email;
    public $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome , $email,$fixo,$celular,$mensagem)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->fixo = $fixo;
        $this->celular = $celular;
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contato')->subject("Contato realizado pelo site");
        
    }
}
