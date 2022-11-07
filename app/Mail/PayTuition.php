<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayTuition extends Mailable
{
    use Queueable, SerializesModels;

    protected $desc;
    protected $student;

    public function __construct($student, $desc)
    {
        $this->student = $student;
        $this->desc = $desc;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Tuition Paid Successfully',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.payTuition',
            with: [
                'student' => $this->student,
                'desc' => $this->desc,
                'url' => url('/'),
            ]
        );
    }
}
