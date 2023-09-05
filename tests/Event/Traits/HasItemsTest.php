<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

use PHPUnit\Framework\TestCase;
use Setono\GoogleAnalyticsEvents\Event\Item\Item;
use Setono\GoogleAnalyticsEvents\Event\ItemsAware;

final class HasItemsTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates(): void
    {
        $obj = new ClassUsingHasItems();
        self::assertEmpty($obj->getItems());
    }

    /**
     * @test
     */
    public function it_is_mutable(): void
    {
        $items = [Item::create()];

        $obj = new ClassUsingHasItems();
        $obj->setItems($items);
        self::assertSame($items, $obj->getItems());

        $obj->addItem(Item::create());
        self::assertCount(2, $obj->getItems());
    }
}

final class ClassUsingHasItems implements ItemsAware
{
    use HasItems;
}
