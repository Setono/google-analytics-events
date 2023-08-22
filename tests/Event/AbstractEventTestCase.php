<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use PHPUnit\Framework\TestCase;

abstract class AbstractEventTestCase extends TestCase
{
    abstract protected function getEvent(): Event;

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
}
