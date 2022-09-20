<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactOwnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data,$data2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$data2)
    {
        $this->data = $data;
        $this->data2 = $data2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data->email,$this->data->name)
        ->subject('お問合せがありました。')
        ->text('emails.owner');
    }
}
