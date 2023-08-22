<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasListId;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasListName;

class ViewItemListEvent extends Event
{
    use CreatesEmpty;

    use HasListId;

    use HasListName;

    use HasItems;

    public static function getName(): string
    {
        return 'view_item_list';
    }

    protected function getParameterMapping(): array
    {
        return [
            'item_list_id' => $this->listId,
            'item_list_name' => $this->listName,
            'items' => $this->items,
        ];
    }
}
