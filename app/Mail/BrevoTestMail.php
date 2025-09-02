<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class BrevoTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected array $data;
    public string $pdfPath;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->pdfPath = $data['pdf_full_path'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Your Requested Report on ".$this->data['title']." – From Gresham Global",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dump("Here 2...");
        return new Content(
            view: 'emails.pdf',
            with: $this->data
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

    public function attachments(): array
    {

        $title = $this->data['publicationTitle'] ?? 'Report';
        $safeTitle = Str::slug($title); // Converts to lowercase, replaces spaces and special chars with -

        return [
            Attachment::fromPath($this->data['pdf_full_path'])
                ->as($safeTitle . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
