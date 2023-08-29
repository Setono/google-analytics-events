<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class ViewItemEvent extends GenericEvent
{
    public const NAME = 'view_item';

    use CreatesEmpty;

    use HasCurrency;

    use HasItems;

    use HasValue;

    public static function getName(): string
    {
        return 'view_item';
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
