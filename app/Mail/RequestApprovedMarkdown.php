<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestApprovedMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
        // Generate the PDF
        $pdf = Pdf::loadView('pdfs.request_approved', ['request' => $this->request]);

        return $this
            ->subject('Request Approved')
            ->markdown('emails.request_approved')
            ->attachData($pdf->output(), 'request_approved.pdf');
    }
}
