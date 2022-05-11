<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Reservation;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $locale;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
        $this->locale = session('locale');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'BENU')
                    ->subject('BENU - Demande de réservation reçue')
                    ->view('emails.reservation-confirmation');
    }
}
