<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

trait CreatesEmpty
{
    public static function create(): self
    {
        return new self();
    }
}
