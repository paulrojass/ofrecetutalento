<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarReclamo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $distressCall;

    public function __construct(DistressCall $distressCall)
    {
        $this->distressCall = $distressCall;
    }

    public function build(Request $request)
    {
        return $this->view('mails.reporte');
    }
}
