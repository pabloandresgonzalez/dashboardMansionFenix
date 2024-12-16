<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\wallet_transactions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;

class StatusChangeTransactionMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $Wallet;

    /**
     * Create a new message instance.
     */
    public function __construct(wallet_transactions $Wallet)
    {
        $this->Wallet = $Wallet;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notificación cambio de estado ' . $this->Wallet->currency,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.StatusChangeTransactionMessage', // Vista de Blade para el cuerpo del correo
            with: ['Wallet' => $this->Wallet],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('img/laravel-logo.png'))
                      ->as('laravel-logo.png')
                      ->withMime('image/png'),
        ];
    }
}
