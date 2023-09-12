<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

trait HasListId
{
    protected ?string $itemListId = null;

    public function getItemListId(): ?string
    {
        return $this->itemListId;
    }

    /**
     * @return static
     */
    public function setItemListId(?string $itemListId): self
    {
        $this->itemListId = $itemListId;

        return $this;
    }
}
