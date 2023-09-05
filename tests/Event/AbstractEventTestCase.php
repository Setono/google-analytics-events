<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use PHPUnit\Framework\TestCase;

abstract class AbstractEventTestCase extends TestCase
{
    abstract protected function getEvent(): GenericEvent;

    abstract protected function getExpectedParameters(): array;

    /**
     * @test
     */
    public function it_returns_correct_parameters(): void
    {
        self::assertEquals(
            $this->getExpectedParameters(),
            $this->getEvent()->getParameters(),
        );
    }

    /**
     * @test
     */
    public function it_implements_items_aware_interface_if_applicable(): void
    {
        $event = $this->getEvent();
        if (method_exists($event, 'getItems')) {
            self::assertInstanceOf(ItemsAware::class, $event);
        } else {
            $this->markTestSkipped();
        }
    }
}
