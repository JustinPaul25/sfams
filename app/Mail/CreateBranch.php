<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBranch extends Mailable
{
    use Queueable, SerializesModels;

    private $branch;
    private $user;

    public function __construct(Branch $branch, User $user)
    {
        $this->branch = $branch;
        $this->user = $user;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Portal Credentials for Branch',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.create-branch',
            with: [
                'branch' => $this->branch,
                'user' => $this->user,
                'url' => url('/'),
            ]
        );
    }
}
