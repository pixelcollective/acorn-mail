<?php

namespace App\Mail;

use Illuminate\Support\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use function \wp_load_alloptions;

/**
 * WordPress Mailable
 *
 * Public properties set in this class
 * are exposed to the mail blade template.
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 * @see     TinyPixel\WordPress\Mail\WordPressMail
 * @link    https://laravel.com/docs/5.8/mail
 *
 * @package    WordPress
 * @subpackage App
 */
class WordPressMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Subject
     *
     * @var string
     */
    public $subject;

    /**
     * Body
     *
     * @var string
     */
    public $body;

    /**
     * Attachment
     *
     * @var array
     */
    public $attach;

    /**
     * Site
     *
     * @var object
     */
    public $site;

    /**
     * Disclaimer
     *
     * @var string
     */
    public $disclaimer;

    /**
     * Logo
     *
     * @var string
     */
    public $logo;

    /**
     * Creates a new WordPress Mailable instance.
     *
     * @param  array $mail
     * @return void
     */
    public function __construct(array $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Sets the email content.
     *
     * @return void
     */
    public function setContents()
    {
        $this->subject    = $this->emailComponent('subject');
        $this->body       = $this->emailComponent('message');
        $this->attach     = $this->emailComponent('attachments');
        $this->disclaimer = $this->emailComponent('disclaimer');
        $this->site       = (object) \wp_load_alloptions();
        $this->logo       = 'https://s.w.org/style/images/about/WordPress-logotype-wmark.png';
    }

    /**
     * Build the message
     *
     * @return \Illuminate\View\View
     */
    public function build()
    {
        $this->setContents();

        if (! is_null($this->subject)) {
            $this->subject($this->subject);
        }

        if (! empty($this->attach)) {
            $this->attach($this->attach);
        }

        return $this->view('Mail::wordpress');
    }

    /**
     * Returns the email component if set.
     *
     * @param  string $component
     * @return mixed
     */
    protected function emailComponent($component)
    {
        return array_key_exists($component, $this->mail) ? $this->mail[$component] : null;
    }
}
