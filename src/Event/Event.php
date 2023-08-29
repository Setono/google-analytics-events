<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

interface Event extends ParametersAware
{
    /**
     * MUST return the event name, e.g. add_to_cart, purchase, etc.
     *
     * See https://developers.google.com/analytics/devguides/collection/ga4/reference/events for an event reference
     */
    public static function getName(): string;
}
