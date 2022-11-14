<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayBranch extends Mailable
{
    use Queueable, SerializesModels;

    protected $desc;
    protected $branch;

    public function __construct($branch, $desc)
    {
        $this->branch = $branch;
        $this->desc = $desc;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Branch Payment',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.pay-branch',
            with: [
                'branch' => $this->branch,
                'desc' => $this->desc,
                'url' => url('/'),
            ]
        );
    }
}
