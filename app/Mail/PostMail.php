<?php

namespace App\Mail;
use App\Models\stub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;
    public $stub;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(stub $stub)
    {
        $this->stub = $stub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yogapriya@integrass.com')
			         ->view('verify.contact');
    }
}
