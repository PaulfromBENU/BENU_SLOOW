<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class NewsletterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $locale;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->locale = session('locale');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'BENU')->subject("Newsletter BENU - Confirmation d'inscription")->view('emails.newsletter-confirmation');
    }
}
