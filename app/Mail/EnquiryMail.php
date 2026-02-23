<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Enquiry Received')
            ->html("
                    <h2>New Enquiry</h2>

                    <p><strong>Name:</strong> {$this->data['full_name']}</p>
                    <p><strong>Email:</strong> {$this->data['email']}</p>
                    <p><strong>Designation:</strong> {$this->data['designation']}</p>
                    <p><strong>Organisation:</strong> {$this->data['organisation']}</p>
                    <p><strong>Services:</strong> {$this->data['services']}</p>
                    <p><strong>Message:</strong><br>{$this->data['message']}</p>
                ");
    }
}
