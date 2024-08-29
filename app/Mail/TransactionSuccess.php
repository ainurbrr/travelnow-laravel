<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Transaction;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransactionSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Transaction $transaction
    ) {}

    // /**
    //  * Get the message envelope.
    //  */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('codenameabr@gmail.com', 'Travel Now'),
            subject: 'Transaction Success',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.transaction-success',
        );
    }

    // public function build(){
    //     return $this
    //     ->from('codename@gmail.com', 'Travel Now')
    //     ->subject('Travel Now Your Tickets')
    //     ->view('email.transaction-success');
    // }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
