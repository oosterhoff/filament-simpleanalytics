# Show your skyrocketing SimpleAnalytics stats right in your FilamentPHP application.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oosterhoff/filament-simpleanalytics.svg?style=flat-square)](https://packagist.org/packages/oosterhoff/filament-simpleanalytics)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oosterhoff/filament-simpleanalytics/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oosterhoff/filament-simpleanalytics/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oosterhoff/filament-simpleanalytics/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oosterhoff/filament-simpleanalytics/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oosterhoff/filament-simpleanalytics.svg?style=flat-square)](https://packagist.org/packages/oosterhoff/filament-simpleanalytics)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require oosterhoff/filament-simpleanalytics
```

## Configuration

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-simpleanalytics-config"
```

After publishing the config file, you need to set up your SimpleAnalytics credentials in your `.env` file:

```env
SIMPLE_ANALYTICS_API_KEY=your-api-key
SIMPLE_ANALYTICS_WEBSITE=your-website
```

If you have a public SimpleAnalytics site, you can leave the `SIMPLE_ANALYTICS_API_KEY` empty.

## Usage

You can now register the widgets in your Filament dashboard or pages.

```php
use Oosterhoff\FilamentSimpleanalytics\Widgets\VisitorsPageviewsWidget;
```

```php
->widgets([
    VisitorsPageviewsWidget::class,
])
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [oosterhoff](https://github.com/oosterhoff)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
