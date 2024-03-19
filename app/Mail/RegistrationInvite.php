<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\UserInvitation;

class RegistrationInvite extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private readonly UserInvitation $invitation)
    {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.invitation',
            with: [
                'inviteUrl' => urldecode(route('register') . '?invitation_token=' . $this->invitation->token),
            ]
        );
    }
}
