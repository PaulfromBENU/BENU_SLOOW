<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Models\Opening;
use App\Models\Reservation;

use App\Mail\ReservationRequest;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationNotificationForAdmin;

class SendReservationEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reservation;
    protected $opening_id;
    protected $email;

    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $opening_id, Reservation $reservation, string $email)
    {
        $this->opening_id = $opening_id;
        $this->reservation = $reservation;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (Opening::find($this->opening_id)->type == '0') {
            Mail::mailer('smtp')->to($this->email)->send(new ReservationConfirmation($this->reservation));
        } else {
            Mail::mailer('smtp')->to($this->email)->send(new ReservationRequest($this->reservation));
        }
        // Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new ReservationNotificationForAdmin($this->reservation));
        Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new ReservationNotificationForAdmin($this->reservation));
    }
}
