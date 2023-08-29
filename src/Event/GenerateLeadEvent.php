<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class GenerateLeadEvent extends GenericEvent
{
    use CreatesEmpty;

    use HasCurrency;

    use HasValue;

    public static function getName(): string
    {
        return 'generate_lead';
    }

    protected function getParameterMapping(): array
    {
        return [
            'currency' => $this->currency,
            'value' => $this->value,
        ];
    }
}
