<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\AddShippingInfoEvent
 */
final class AddShippingInfoEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return AddShippingInfoEvent::create()
            ->setCurrency('USD')
            ->setValue(123.45)
            ->setCoupon('WINTER_SALE')
            ->setShippingTier('EXPENSIVE')
            ->addItem(Item::create()->setId('SKU1234')->setName('Blue t-shirt'))
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'currency' => 'USD',
            'value' => 123.45,
            'coupon' => 'WINTER_SALE',
            'shipping_tier' => 'EXPENSIVE',
            'items' => [
                ['item_id' => 'SKU1234', 'item_name' => 'Blue t-shirt', 'quantity' => 1],
            ],
        ];
    }
}
