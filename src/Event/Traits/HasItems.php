<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

use Setono\GoogleAnalyticsEvents\Event\Item\Item;

trait HasItems
{
    /** @var list<Item> */
    protected array $items = [];

    /**
     * @return list<Item>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return static
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @param list<Item> $items
     *
     * @return static
     */
    public function setItems(array $items): self
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }
}
