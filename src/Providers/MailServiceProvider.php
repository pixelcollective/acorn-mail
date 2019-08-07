<?php

namespace TinyPixel\Acorn\Mail\Providers;

use TinyPixel\Acorn\Mail\WordPressMail;
use Illuminate\Mail\MailServiceProvider as IlluminateMailServiceProvider;
use Illuminate\Support\Collection;
use Roots\Acorn\ServiceProvider;

/**
 * Mail service provider
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
        $this->app->register(IlluminateMailServiceProvider::class);

        $this->app->singleton('mailer.wordpress', function () {
            return new WordPressMail($this->app);
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
            __DIR__ . '/../config/mail.php'     => $this->app->configPath('mail.php'),
            __DIR__ . '/../config/services.php' => $this->app->configPath('services.php'),
            __DIR__ . '/../views'               => $this->app->resourcePath('views/mail'),
            __DIR__ . '/../Mail'                => $this->app->path('Mail'),
        ]);

        $this->app['view']->addNamespace('Mail', $this->app->resourcePath('views/mail'));

        $this->app->make('mailer.wordpress')->init();
    }
}
