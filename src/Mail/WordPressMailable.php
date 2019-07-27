<?php

namespace App\Mail;

// WordPress
use function \wp_load_alloptions;

// Illuminate framework
use Illuminate\Support\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * WordPress Mailable
 *
 * Public properties set in this class
 * are exposed to the mail blade template.
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 * @see     \TinyPixel\WordPress\Mail\WordPressMail
 * @link    https://laravel.com/docs/5.8/mail
 *
 * @package    WordPress
 * @subpackage App
 */
class WordPressMailable extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    public $subject;

    /** @var string */
    public $body;

    /** @var array */
    public $attach;

    /** @var object */
    public $site;

    /** @var string */
    public $disclaimer;

    /** @var string */
    public $logo;

    /**
     * Creates a new message instance.
     *
     * @param  array $mail
     * @return void
     */
    public function __construct(array $mail)
    {
        $this->mail = $mail;
    }

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
     * @return object $this
     */
    public function build()
    {
        $this->setContents();

        if (!is_null($this->subject)) {
            $this->subject($this->subject);
        }

        if (!empty($this->attach)) {
            $this->attach($this->attach);
        }

        return $this->view('Mail::wordpress');
    }

    /**
     * Returns email component, if set
     *
     * @param string $component
     * @return mixed
     */
    protected function emailComponent($component)
    {
        return array_key_exists($component, $this->mail) ? $this->mail[$component] : null;
    }
}
