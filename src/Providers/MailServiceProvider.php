<?php

namespace TinyPixel\WordPress\Mail\Providers;

// Illuminate framework
use \Illuminate\Mail\MailServiceProvider as IlluminateMailServiceProvider;
use \Illuminate\Support\Collection;

// Roots
use \Roots\Acorn\ServiceProvider;
use function \Roots\config_path;

// Internal
use \TinyPixel\WordPress\Mail\WordPressMail;

/**
 * Mail Service Provider
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   1.0.0
 */
class MailServiceProvider extends ServiceProvider
{
    /**
      * Register any application services.
      *
      * @return void
      */
    public function register()
    {
        $this->app->singleton('mail', function () {
            new IlluminateMailServiceProvider($this->app);
        });

        $this->app->singleton('wordpress.mail', function () {
            new WordPressMail($this->app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mail.php' => config_path('mail.php'),
        ]);

        $this->app->make('mail');
        $this->app->make('wordpress.mail')->init();
    }
}
