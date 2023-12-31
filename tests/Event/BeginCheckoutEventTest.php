<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\BeginCheckoutEvent
 */
final class BeginCheckoutEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return BeginCheckoutEvent::create()
            ->setCurrency('USD')
            ->setValue(123.45)
            ->setCoupon('SUMMER_SALE')
            ->addItem(Item::create()->setItemId('SKU1234')->setItemName('Blue t-shirt'))
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'currency' => 'USD',
            'value' => 123.45,
            'coupon' => 'SUMMER_SALE',
            'items' => [
                ['item_id' => 'SKU1234', 'item_name' => 'Blue t-shirt', 'quantity' => 1],
            ],
        ];
    }
}
