<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\PurchaseEvent
 */
final class PurchaseEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return PurchaseEvent::create('TRANS_1234')
            ->setCurrency('USD')
            ->setValue(123.45)
            ->setTax(10.45)
            ->setShipping(3.32)
            ->addItem(Item::create()->setId('SKU1234')->setName('Blue t-shirt'))
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'transaction_id' => 'TRANS_1234',
            'currency' => 'USD',
            'value' => 123.45,
            'tax' => 10.45,
            'shipping' => 3.32,
            'items' => [
                ['item_id' => 'SKU1234', 'item_name' => 'Blue t-shirt', 'quantity' => 1],
            ],
        ];
    }
}
