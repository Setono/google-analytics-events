<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCoupon;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class AddShippingInfoEvent extends GenericEvent implements ItemsAware
{
    use CreatesEmpty;

    use HasCurrency;

    use HasValue;

    use HasCoupon;

    use HasItems;

    protected ?string $shippingTier = null;

    public static function getName(): string
    {
        return 'add_shipping_info';
    }

    public function getShippingTier(): ?string
    {
        return $this->shippingTier;
    }

    public function setShippingTier(?string $shippingTier): self
    {
        $this->shippingTier = $shippingTier;

        return $this;
    }

    protected function getParameterMapping(): array
    {
        return [
            'currency' => $this->currency,
            'value' => $this->value,
            'coupon' => $this->coupon,
            'shipping_tier' => $this->shippingTier,
            'items' => $this->items,
        ];
    }
}
