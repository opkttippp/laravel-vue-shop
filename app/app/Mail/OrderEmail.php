<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Order Email'
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail',
            with: ['name' => $this->data['customerName'],
                'orderNumber' => $this->data['id'],
                'total' => $this->data['total'],
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
