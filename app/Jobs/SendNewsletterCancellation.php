<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Mail\NewsletterCancelConfirmationForAdmin;

use App\Models\User;

class SendNewsletterCancellation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::mailer('smtp_admin')->to('paul.guillard@benu.lu')->send(new NewsletterCancelConfirmationForAdmin($this->user));
        Mail::mailer('smtp_admin')->to(config('mail.mailers.smtp_admin.admin_receiver'))->send(new NewsletterCancelConfirmationForAdmin($this->user));
    }
}
