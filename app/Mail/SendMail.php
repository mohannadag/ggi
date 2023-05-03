<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $imagesendbymailwithstore;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($imagesendbymailwithstore)
    {
        $this->imagesendbymailwithstore = $imagesendbymailwithstore;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@ggiturkey.com')
        ->subject('New Career Application to GGI Turkey')
        ->view('emails.career')
        ->with('data', $this->imagesendbymailwithstore)
        ->attach($this->imagesendbymailwithstore['image']->getRealPath(),
            [
                    'as' => $this->imagesendbymailwithstore['image']->getClientOriginalName(),
                'mime' => $this->imagesendbymailwithstore['image']->getClientMimeType(),
            ]);

    }
}
