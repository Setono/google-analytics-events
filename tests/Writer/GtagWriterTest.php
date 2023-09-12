<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Writer;

use PHPUnit\Framework\TestCase;
use Setono\GoogleAnalyticsEvents\Event\GenerateLeadEvent;
use Setono\GoogleAnalyticsEvents\Event\Item\Item;
use Setono\GoogleAnalyticsEvents\Event\PurchaseEvent;

final class GtagWriterTest extends TestCase
{
    /**
     * @test
     */
    public function it_writes_ecommerce_event(): void
    {
        $event = PurchaseEvent::create('TRANS_1234')
            ->setCurrency('USD')
            ->setValue(123.45)
            ->setTax(10.45)
            ->setShipping(3.32)
            ->addItem(Item::create()->setItemId('SKU1234')->setItemName('Blue t-shirt'))
            ->setCustomParameter('user_status', 'Crazy')
        ;

        $writer = new GtagWriter();
        self::assertSame(
            'gtag("event", "purchase", {"user_status":"Crazy","currency":"USD","transaction_id":"TRANS_1234","value":123.45,"shipping":3.32,"tax":10.45,"items":[{"item_id":"SKU1234","item_name":"Blue t-shirt","quantity":1}]});',
            $writer->write($event)
        );
    }

    /**
     * @test
     */
    public function it_writes_non_ecommerce_event(): void
    {
        $event = GenerateLeadEvent::create()
            ->setCurrency('USD')
            ->setValue(123.45)
            ->setCustomParameter('user_status', 'Crazy')
        ;

        $writer = new GtagWriter();
        self::assertSame(
            'gtag("event", "generate_lead", {"user_status":"Crazy","currency":"USD","value":123.45});',
            $writer->write($event)
        );
    }
}
