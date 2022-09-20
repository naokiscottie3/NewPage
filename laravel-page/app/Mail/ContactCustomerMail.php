<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactCustomerMail extends Mailable
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
        return $this->from('naokiscottie5@yahoo.co.jp')
        ->subject('お問合せを受け付けました。')
        ->text('emails.customer');
    }

}
