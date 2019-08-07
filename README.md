# Acorn Mail

![Package Version](https://img.shields.io/packagist/v/tiny-pixel/acorn-mail?style=flat-square)
![Total Downloads](https://img.shields.io/packagist/dt/tiny-pixel/acorn-mail?style=flat-square)

Provides Acorn projects (e.g. Sage 10) with a Mail service that replaces the default WordPress PHPMailer behavior with that of [SwiftMailer](https://swiftmailer.symfony.com/) and [Laravel Mail](https://laravel.com/docs/5.8/mail).

## Requirements

- [Sage](https://github.com/roots/sage) >= 10.0
- [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3
- [Composer](https://getcomposer.org)

## Installation

Install via Composer:

```bash
$ composer require tiny-pixel/acorn-mail
```

After installation, run the following command to publish the starter configuration file(s) to your application:

```bash
$ wp acorn vendor:publish
```

## Bug Reports

If you discover a bug in Acorn Mail, please [open an issue](https://github.com/pixelcollective/acorn-mail/issues).

## Contributing

Contributing whether it be through PRs, reporting an issue, or suggesting an idea is encouraged and appreciated.

## License

Acorn Mail is provided under the [MIT License](https://github.com/pixelcollective/acorn-mail/blob/master/LICENSE.md).
