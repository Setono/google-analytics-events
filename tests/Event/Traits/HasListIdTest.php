<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

use PHPUnit\Framework\TestCase;

final class HasListIdTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates(): void
    {
        $obj = new ClassUsingHasListId();
        self::assertNull($obj->getItemListId());
    }

    /**
     * @test
     */
    public function it_is_mutable(): void
    {
        $obj = new ClassUsingHasListId();
        $obj->setItemListId('value');
        self::assertSame('value', $obj->getItemListId());
    }
}

final class ClassUsingHasListId
{
    use HasListId;
}
