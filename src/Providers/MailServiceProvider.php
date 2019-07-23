<?php

namespace TinyPixel\WordPress\Mail\Providers;

// Illuminate framework
use \Illuminate\Mail\MailServiceProvider as IlluminateMailServiceProvider;
use \Illuminate\Support\Collection;

// Roots
use \Roots\Acorn\ServiceProvider;
use function \Roots\base_path;
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
        $this->app->singleton('wordpress.mail', function () {
            return new WordPressMail($this->app);
        });

        $this->app->register(IlluminateMailServiceProvider::class);
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
            __DIR__ . '/../Mail'            => base_path('app/Mail'),
            __DIR__ . '/../Templates'       => base_path('resources/views/vendor/mail'),
        ]);

        $this->app['view']->addNamespace('Mail', base_path('resources/views/vendor/mail'));

        $this->app->make('wordpress.mail')->init();
    }
}
