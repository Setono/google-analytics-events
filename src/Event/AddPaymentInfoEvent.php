<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\CreatesEmpty;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCoupon;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class AddPaymentInfoEvent extends GenericEvent implements ItemsAware
{
    use CreatesEmpty;

    use HasCurrency;

    use HasValue;

    use HasCoupon;

    use HasItems;

    protected ?string $paymentType = null;

    public static function getName(): string
    {
        return 'add_payment_info';
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    protected function getParameterMapping(): array
    {
        return [
            'currency' => $this->currency,
            'value' => $this->value,
            'coupon' => $this->coupon,
            'payment_type' => $this->paymentType,
            'items' => $this->items,
        ];
    }
}
