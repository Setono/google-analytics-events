# Google Analytics 4 (GA4) Events library

[![Latest Version][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Mutation testing][ico-infection]][link-infection]

Easily build [Google Analytics 4 Events](https://developers.google.com/analytics/devguides/collection/ga4/reference/events).

## Installation

```bash
composer require setono/google-analytics-events
```

## Usage

```php
use Setono\GoogleAnalyticsEvents\Event\PurchaseEvent;
use Setono\GoogleAnalyticsEvents\Writer\GtagWriter;

$event = PurchaseEvent::create('TRANS_1234')
    ->setCurrency('USD')
    ->setValue(123.45)
    ->setTax(10.45)
    ->setShipping(3.32)
    ->addItem(Item::create()->setId('SKU1234')->setName('Blue t-shirt'))
;

$writer = new GtagWriter();
echo $writer->write($event); // output: gtag("event", "purchase", {"currency":"USD","transaction_id":"TRANS_1234","value":123.45,"shipping":3.32,"tax":10.45,"items":[{"item_id":"SKU1234","item_name":"Blue t-shirt","quantity":1}]});
```

## References

- https://developers.google.com/analytics/devguides/collection/ga4/reference/events
- https://support.google.com/analytics/answer/9234069
- https://support.google.com/analytics/answer/9216061

[ico-version]: https://poser.pugx.org/setono/google-analytics-events/v/stable
[ico-license]: https://poser.pugx.org/setono/google-analytics-events/license
[ico-github-actions]: https://github.com/Setono/google-analytics-events/workflows/build/badge.svg
[ico-code-coverage]: https://codecov.io/gh/Setono/google-analytics-events/branch/master/graph/badge.svg
[ico-infection]: https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2FSetono%2Fgoogle-analytics-events%2Fmaster

[link-packagist]: https://packagist.org/packages/setono/google-analytics-events
[link-github-actions]: https://github.com/Setono/google-analytics-events/actions
[link-code-coverage]: https://codecov.io/gh/Setono/google-analytics-events
[link-infection]: https://dashboard.stryker-mutator.io/reports/github.com/Setono/google-analytics-events/master
