<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

interface ItemsAware
{
    /**
     * @return list<Item>
     */
    public function getItems(): array;
}
