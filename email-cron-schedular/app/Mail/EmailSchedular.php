<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPUnit\Framework\Constraint\Exception;

class EmailSchedular extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@ngumicreatives.com';
        $subject = 'New Designers This Week!';
        $name = 'Ngumi Creatives';

            return $this->view('emails.newThisWeek')
                            ->from($address, $name)
                            ->subject($subject);
    }
}
