<?php

namespace App\Mail;

use App\Spear;
use App\Target;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PhishingEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $spear;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Spear $spear)
    {
        $this->spear = $spear;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Spam Quarantine Report')
        ->view('mails.quarantine', ['spear' => $this->spear]);
        // ->markdown('mails.exmpl')
        // ->with([
        //     'name' => $this->spear->target->first_name,
        //     'link' => $this->spear->target->email
        // ]);
        // return $this->view('view.name');
    }
}
