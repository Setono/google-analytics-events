<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class RemoveFromCartEvent extends GenericEvent implements ItemsAware
{
    public const NAME = 'remove_from_cart';

    use CreatesEmpty;

    use HasCurrency;

    use HasItems;

    use HasValue;

    public static function getName(): string
    {
        return 'remove_from_cart';
    }

    protected function getParameterMapping(): array
    {
        return [
            'currency' => $this->currency,
            'value' => $this->value,
            'items' => $this->items,
        ];
    }
}
