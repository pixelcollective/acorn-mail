<?php

namespace TinyPixel\WordPress\Mail;

// WordPress
use function \add_action;
use function \get_bloginfo;

// Illuminate framework
use \Illuminate\Support\Collection;
use \Illuminate\Support\Facades\Mail;

// Roots
use \Roots\Acorn\Application;

// Internal
use \App\Mail\WordPress;

/**
 * WordPress Mail
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
class WordPressMail
{
    /**
     * Constructor
     *
     * @param  \Roots\Acorn\Application $app
     * @return object $this
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Initializes class
     *
     * @param  \Illuminate\Support\Collection $config
     * @return object $this
     */
    public function init()
    {
        add_filter('wp_mail', [$this, 'mail']);

        return $this;
    }

    public function mail(array $mail)
    {
        Mail::to($mail['to'])
            ->send(new WordPress([
                'subject'     => $mail['subject'] !== '' ? $mail['subject'] : null,
                'body'        => $mail['message'],
                'attachments' => isset($mail['attachments']) ? $mail['attachments'] : [],
            ]));

        return null;
    }
}
