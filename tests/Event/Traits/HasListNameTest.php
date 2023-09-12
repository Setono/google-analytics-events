<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

use PHPUnit\Framework\TestCase;

final class HasListNameTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates(): void
    {
        $obj = new ClassUsingHasListName();
        self::assertNull($obj->getItemListName());
    }

    /**
     * @test
     */
    public function it_is_mutable(): void
    {
        $obj = new ClassUsingHasListName();
        $obj->setItemListName('value');
        self::assertSame('value', $obj->getItemListName());
    }
}

final class ClassUsingHasListName
{
    use HasListName;
}
