<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

use PHPUnit\Framework\TestCase;

final class HasAffiliationTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates(): void
    {
        $obj = new HasAffiliationClass();
        self::assertNull($obj->getAffiliation());
    }

    /**
     * @test
     */
    public function it_is_mutable(): void
    {
        $obj = new HasAffiliationClass();
        $obj->setAffiliation('value');
        self::assertSame('value', $obj->getAffiliation());
    }
}

final class HasAffiliationClass
{
    use HasAffiliation;
}
