<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\RemoveFromCartEvent
 */
final class RemoveFromCartEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return RemoveFromCartEvent::create()
            ->setCurrency('USD')
            ->setValue(123.45)
            ->addItem(Item::create()->setId('SKU1234')->setName('Blue t-shirt'))
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'currency' => 'USD',
            'value' => 123.45,
            'items' => [
                ['item_id' => 'SKU1234', 'item_name' => 'Blue t-shirt', 'quantity' => 1],
            ],
        ];
    }
}
