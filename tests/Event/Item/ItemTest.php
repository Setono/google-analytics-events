<?php

declare(strict_types=1);

namespace Setono\GoogleAnalyticsEvents\Event\Item;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\GoogleAnalyticsEvents\Event\Item\Item
 */
final class ItemTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_working_getters(): void
    {
        $item = $this->getItem();

        self::assertSame('SKU1234', $item->getId());
        self::assertSame('Blue t-shirt', $item->getName());
        self::assertSame('Google Merchandise Store', $item->getAffiliation());
        self::assertSame('SUMMER_FUN', $item->getCoupon());
        self::assertSame('USD', $item->getCurrency());
        self::assertSame(2.22, $item->getDiscount());
        self::assertSame(0, $item->getIndex());
        self::assertSame('Google', $item->getBrand());
        self::assertSame('Apparel', $item->getCategory());
        self::assertSame('Adult', $item->getCategory2());
        self::assertSame('Shirts', $item->getCategory3());
        self::assertSame('Crew', $item->getCategory4());
        self::assertSame('Short sleeve', $item->getCategory5());
        self::assertSame('related_products', $item->getListId());
        self::assertSame('Related Products', $item->getListName());
        self::assertSame('green', $item->getVariant());
        self::assertSame('ChIJIQBpAG2ahYAR_6128GcTUEo', $item->getLocationId());
        self::assertSame(9.99, $item->getPrice());
        self::assertSame(1, $item->getQuantity());
        self::assertTrue($item->hasCustomParameter('google_business_vertical'));
        self::assertSame('retail', $item->getCustomParameter('google_business_vertical'));
    }

    private function getItem(): Item
    {
        return Item::create()
            ->setId('SKU1234')
            ->setName('Blue t-shirt')
            ->setAffiliation('Google Merchandise Store')
            ->setCoupon('SUMMER_FUN')
            ->setCurrency('USD')
            ->setDiscount(2.22)
            ->setIndex(0)
            ->setBrand('Google')
            ->setCategory('Apparel')
            ->setCategory2('Adult')
            ->setCategory3('Shirts')
            ->setCategory4('Crew')
            ->setCategory5('Short sleeve')
            ->setListId('related_products')
            ->setListName('Related Products')
            ->setVariant('green')
            ->setLocationId('ChIJIQBpAG2ahYAR_6128GcTUEo')
            ->setPrice(9.99)
            ->setQuantity(1)
            ->setCustomParameter('google_business_vertical', 'retail')
        ;
    }
}
