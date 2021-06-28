<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    /**
     * Create a new message instance.
     *
     * @param $otp
     */
    public function __construct($otp)
    {
        return $this->otp=$otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): OtpMail
    {
        return $this->from('mehdiprogrammer30@gmail.com')->view('mail.otp');
    }
}
