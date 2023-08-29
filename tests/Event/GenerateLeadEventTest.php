<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\GenerateLeadEvent
 */
final class GenerateLeadEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return GenerateLeadEvent::create()
            ->setCurrency('USD')
            ->setValue(123.45)
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'currency' => 'USD',
            'value' => 123.45,
        ];
    }
}
