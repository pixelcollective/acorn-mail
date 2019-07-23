<?php

namespace App\Mail;

// Illuminate framework
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * WordPress
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 *
 * @package    WordPress
 * @subpackage Acorn Mail
 */
class WordPress extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    public $notice;

    /**
     * Create a new message instance.
     *
     * @param  array $wp_message
     * @return void
     */
    public function __construct(array $wp_message)
    {
        $this->messageParts = $wp_message;

        $this->notice = (object) [
            'user'     => $wp_message['user'],
            'siteName' => $wp_message['siteName'],
            'message'  => $wp_message['message'],
        ];
    }

    /**
     * Build the message.
     *
     * @return object $this
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
