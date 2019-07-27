<?php

namespace TinyPixel\WordPress\Mail;

// WordPress
use function \add_action;

// Illuminate framework
use \Illuminate\Support\Collection;
use \Illuminate\Support\Facades\Mail;

// Roots
use \Roots\Acorn\Application;

// Internal
use \App\Mail\WordPressMailable;

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
        $mail['message'] = $this->replaceWordPressBreaks(
            $this->replaceWordPressUrls($mail['message'])
        );

        Mail::to($mail['to'])->send(new WordPressMailable($mail));

        return null;
    }

    /**
     * Replaces WordPress email URL formatting
     * with something that won't get stripped from html email
     *
     * @param  string $copy
     * @return string
     */
    public function replaceWordPressUrls($copy)
    {
        preg_match('~<(.*?)>~', $copy, $output);

        return str_replace($output[0], $output[1], $copy);
    }

    /**
     * Replaces WordPress default linebreaks with HTML
     * entities
     *
     * @param  string $copy
     * @return string
     */
    public function replaceWordPressBreaks($copy)
    {
        return str_replace("\r\n", "<br />", $copy);
    }

}
