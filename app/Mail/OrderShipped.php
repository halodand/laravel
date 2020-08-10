<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $transaction;

    /**
     * Create a new message instance.
     *
     * @param mixed $transaction
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $transaction = Transaction::where('id', $this->transaction->id)
            ->with([
                'id_partner', 'jenis_currency', 'bank.nama', 'currency_member.nama', 'diproses', 'team',
            ])->first();

        return $this->markdown('emails.orders.shipped', ['transaction' => $transaction]);
    }
}
