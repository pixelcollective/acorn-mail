<?php

namespace TinyPixel\Acorn\Mail\Providers;

use TinyPixel\Acorn\Mail\WordPressMail;
use Illuminate\Mail\MailServiceProvider as IlluminateMailServiceProvider;
use Illuminate\Support\Collection;
use Roots\Acorn\ServiceProvider;

use function Roots\base_path;
use function Roots\config_path;
use function Roots\resource_path;

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
            __DIR__ . '/../config/mail.php'     => config_path('mail.php'),
            __DIR__ . '/../config/services.php' => config_path('services.php'),
            __DIR__ . '/../views'               => resource_path('views/mail'),
            __DIR__ . '/../Mail'                => base_path('app/Mail'),
        ]);

        $this->app['view']->addNamespace('Mail', resource_path('views/mail'));

        $this->app->make('mailer.wordpress')->init();
    }
}
