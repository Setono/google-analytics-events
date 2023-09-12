<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Traits;

trait HasListName
{
    protected ?string $itemListName = null;

    public function getItemListName(): ?string
    {
        return $this->itemListName;
    }

    /**
     * @return static
     */
    public function setItemListName(?string $itemListName): self
    {
        $this->itemListName = $itemListName;

        return $this;
    }
}
