<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event;

use Setono\GoogleAnalyticsEvents\Event\Traits\HasAffiliation;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCoupon;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasCurrency;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasItems;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasTransactionId;
use Setono\GoogleAnalyticsEvents\Event\Traits\HasValue;

class PurchaseEvent extends GenericEvent implements ItemsAware
{
    use HasCurrency;

    use HasItems;

    use HasValue;

    use HasCoupon;

    use HasTransactionId;

    use HasAffiliation;

    protected ?float $shipping = null;

    protected ?float $tax = null;

    public static function getName(): string
    {
        return 'purchase';
    }

    public function __construct(string $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public static function create(string $transactionId): self
    {
        return new self($transactionId);
    }

    public function getShipping(): ?float
    {
        return $this->shipping;
    }

    public function setShipping(?float $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(?float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    protected function getParameterMapping(): array
    {
        return [
            'currency' => $this->currency,
            'transaction_id' => $this->transactionId,
            'value' => $this->value,
            'coupon' => $this->coupon,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'items' => $this->items,
        ];
    }
}
