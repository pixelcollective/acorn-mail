<?php

namespace TinyPixel\WordPress\Mail;

// WordPress
use \PHPMailer;
use function \phpMailerException;
use function \add_query_arg;
use function \admin_url;
use function \get_bloginfo;
use function \get_option;
use function \update_option;
use function \wp_nonce_url;

// Illuminate framework
use \Illuminate\Support\Collection;
use \Illuminate\Support\Facades\Cache;

// Roots
use \Roots\Acorn\Application;

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
    public function init(Collection $config)
    {
        $this->config = $config;

        return $this;
    }
}
