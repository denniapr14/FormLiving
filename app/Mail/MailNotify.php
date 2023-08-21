<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data=[];
    // protected $pdfPath;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $data;
    protected $template;

    public function __construct($data, $template)
    {
        $this->data = $data;
        $this->template = $template;
    }

    public function build()
    {
        return $this->from('formliving@greenlandtidar.net','Forms Living Greenland')         
                    ->view($this->template)
                    ->with($this->data);
    }
}