<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\UserMembership;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;

class StatusChangeMembershipseMessageAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $userMembership;

    /**
     * Create a new message instance.
     */
    public function __construct(UserMembership $userMembership)
    {
        $this->userMembership = $userMembership;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cambio estado del Fondo ' . $this->userMembership->membership,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.StatusChangeMembershipseMessageAdmin', // Vista de Blade para el cuerpo del correo
            with: ['membership' => $this->userMembership],
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
