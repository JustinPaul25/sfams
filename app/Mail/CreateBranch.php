<?php

namespace App\Mail;

use App\Models\Branch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateBranch extends Mailable
{
    use Queueable, SerializesModels;

    private $branch;

    public function __construct(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Portal Credentials for '.$this->branch->name,
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.create-branch',
            with: [
                'branch' => $this->branch,
                'url' => url('/'),
            ]
        );
    }
}
