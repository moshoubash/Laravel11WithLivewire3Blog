<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;   
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Message'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
            with: ['user' => $this->user]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
