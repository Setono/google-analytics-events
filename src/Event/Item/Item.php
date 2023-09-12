<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Item;

use Setono\GoogleAnalyticsEvents\Event\ParametersAware;
use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasAffiliation;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCoupon;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCustomParameters;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasListId;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasListName;

class Item implements ParametersAware
{
    use CreatesEmpty;

    use HasAffiliation;

    use HasCoupon;

    use HasCurrency;

    use HasCustomParameters;

    use HasListId;

    use HasListName;

    protected ?string $itemId = null;

    protected ?string $itemName = null;

    protected ?float $discount = null;

    protected ?int $index = null;

    protected ?string $itemBrand = null;

    protected ?string $itemCategory = null;

    protected ?string $itemCategory2 = null;

    protected ?string $itemCategory3 = null;

    protected ?string $itemCategory4 = null;

    protected ?string $itemCategory5 = null;

    protected ?string $itemVariant = null;

    protected ?string $locationId = null;

    protected ?float $price = null;

    protected int $quantity = 1;

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(?string $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(?string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): self
    {
        $this->index = $index;

        return $this;
    }

    public function getItemBrand(): ?string
    {
        return $this->itemBrand;
    }

    public function setItemBrand(?string $itemBrand): self
    {
        $this->itemBrand = $itemBrand;

        return $this;
    }

    public function getItemCategory(): ?string
    {
        return $this->itemCategory;
    }

    public function setItemCategory(?string $itemCategory): self
    {
        $this->itemCategory = $itemCategory;

        return $this;
    }

    public function getItemCategory2(): ?string
    {
        return $this->itemCategory2;
    }

    public function setItemCategory2(?string $itemCategory2): self
    {
        $this->itemCategory2 = $itemCategory2;

        return $this;
    }

    public function getItemCategory3(): ?string
    {
        return $this->itemCategory3;
    }

    public function setItemCategory3(?string $itemCategory3): self
    {
        $this->itemCategory3 = $itemCategory3;

        return $this;
    }

    public function getItemCategory4(): ?string
    {
        return $this->itemCategory4;
    }

    public function setItemCategory4(?string $itemCategory4): self
    {
        $this->itemCategory4 = $itemCategory4;

        return $this;
    }

    public function getItemCategory5(): ?string
    {
        return $this->itemCategory5;
    }

    public function setItemCategory5(?string $itemCategory5): self
    {
        $this->itemCategory5 = $itemCategory5;

        return $this;
    }

    public function getItemVariant(): ?string
    {
        return $this->itemVariant;
    }

    public function setItemVariant(?string $itemVariant): self
    {
        $this->itemVariant = $itemVariant;

        return $this;
    }

    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    public function setLocationId(?string $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getParameters(): array
    {
        $parameters = array_filter([
            'item_id' => $this->itemId,
            'item_name' => $this->itemName,
            'affiliation' => $this->affiliation,
            'coupon' => $this->coupon,
            'currency' => $this->currency,
            'discount' => $this->discount,
            'index' => $this->index,
            'item_brand' => $this->itemBrand,
            'item_category' => $this->itemCategory,
            'item_category2' => $this->itemCategory2,
            'item_category3' => $this->itemCategory3,
            'item_category4' => $this->itemCategory4,
            'item_category5' => $this->itemCategory5,
            'item_list_id' => $this->itemListId,
            'item_list_name' => $this->itemListName,
            'item_variant' => $this->itemVariant,
            'location_id' => $this->locationId,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);

        return array_merge(array_filter($this->getCustomParameters()), $parameters);
    }
}
