<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Writer;

use Setono\GoogleAnalyticsEvents\Event\AddPaymentInfoEvent;
use Setono\GoogleAnalyticsEvents\Event\AddShippingInfoEvent;
use Setono\GoogleAnalyticsEvents\Event\AddToCartEvent;
use Setono\GoogleAnalyticsEvents\Event\BeginCheckoutEvent;
use Setono\GoogleAnalyticsEvents\Event\GenericEvent;
use Setono\GoogleAnalyticsEvents\Event\PurchaseEvent;
use Setono\GoogleAnalyticsEvents\Event\RemoveFromCartEvent;
use Setono\GoogleAnalyticsEvents\Event\ViewCartEvent;
use Setono\GoogleAnalyticsEvents\Event\ViewItemEvent;
use Setono\GoogleAnalyticsEvents\Event\ViewItemListEvent;
use Setono\GoogleAnalyticsEvents\Exception\WriterException;

final class TagManagerWriter implements Writer
{
    private string $dataLayerVariable;

    public function __construct(string $dataLayerVariable = 'dataLayer')
    {
        $this->dataLayerVariable = $dataLayerVariable;
    }

    public function write(GenericEvent $event): string
    {
        $ecommerceEvents = [
            AddPaymentInfoEvent::getName(),
            AddShippingInfoEvent::getName(),
            AddToCartEvent::getName(),
            BeginCheckoutEvent::getName(),
            PurchaseEvent::getName(),
            RemoveFromCartEvent::getName(),
            ViewCartEvent::getName(),
            ViewItemEvent::getName(),
            ViewItemListEvent::getName(),
        ];

        $isEcommerceEvent = in_array($event::getName(), $ecommerceEvents, true);

        $payload = $isEcommerceEvent ? ['ecommerce' => $event->getParameters()] : $event->getParameters();
        $payload['event'] = $event::getName();

        try {
            $json = json_encode($payload, \JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw WriterException::fromJsonException($e);
        }

        if ($isEcommerceEvent) {
            return sprintf(
                '%s.push({ ecommerce: null }); %s.push(%s);',
                $this->dataLayerVariable,
                $this->dataLayerVariable,
                $json
            );
        }

        return sprintf('%s.push(%s);', $this->dataLayerVariable, $json);
    }
}
