<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WordPress extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    public $body;
    public $siteName;
    public $footer;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $wp_message)
    {
        $this->user = wp_get_current_user();
        $this->messageParts = $wp_message;
        $this->siteName = get_bloginfo('site_name');
        $this->body = $wp_message['body'];
        $this->footer = "Powered by Tiny Pixel.";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->messageParts['subject']);

        if (!empty($this->messageParts['attachments'])) {
            $this->attach($this->messageParts['attachments']);
        }

        return $this->view('Mail::wordpress');
    }
}
