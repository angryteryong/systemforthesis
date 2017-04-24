<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class dcgjps extends Mailable
{
    use Queueable, SerializesModels;
    public $resetlink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($var1)
    {
        $this->resetlink = $var1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('passwordresetmail');
    }
}
