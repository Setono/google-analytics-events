<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\ViewItemListEvent
 */
final class ViewItemListEventTest extends AbstractEventTestCase
{
    protected function getEvent(): GenericEvent
    {
        return ViewItemListEvent::create()
            ->setItemListId('LIST_ID')
            ->setItemListName('List name')
            ->addItem(Item::create()->setItemId('SKU1234')->setItemName('Blue t-shirt'))
        ;
    }

    protected function getExpectedParameters(): array
    {
        return [
            'item_list_id' => 'LIST_ID',
            'item_list_name' => 'List name',
            'items' => [
                ['item_id' => 'SKU1234', 'item_name' => 'Blue t-shirt', 'quantity' => 1],
            ],
        ];
    }
}
