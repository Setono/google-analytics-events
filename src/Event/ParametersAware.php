<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

interface ParametersAware
{
    public function getParameters(): array;
}
