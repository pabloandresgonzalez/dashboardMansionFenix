<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;


class NewsCreatedMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $news;

    /**
     * Create a new message instance.
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Noticia: ' . $this->news->title, // Asunto del correo con el título de la noticia
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.createdNews', // Vista de Blade para el cuerpo del correo
            with: ['news' => $this->news], // Pasar la noticia a la vista
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
