<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use \App\Models\Order;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $order;
    public $locale;
    public $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $pdf_invoice)
    {
        $this->order = $order;
        $this->invoice = $pdf_invoice;
        $this->locale = session('locale');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.sender'), 'BENU')
                    ->subject('Merci pour votre achat sur BENU')
                    ->view('emails.new-order')
                    ->attachData($this->invoice->output(), 'BENU_Invoice_'.$this->order->unique_id.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
