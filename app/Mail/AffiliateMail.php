<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AffiliateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $data;
    public $view;
    /**
     * Create a new message instance.
     */
    public function __construct($subject, $data, $view)
    {
        $this->subject = $subject;
        $this->data = $data;
        $this->view = $view;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->view,
        );
    }

    public function build()
    {
        return
            $this->from(env('MAIL_FROM_ADDRESS'), "Make It Memories")
                ->view($this->view)
                ->subject($this->subject)
                ->with([
                    'data' => $this->data,
                ]);
    }

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
