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

        self::assertSame('SKU1234', $item->getItemId());
        self::assertSame('Blue t-shirt', $item->getItemName());
        self::assertSame('Google Merchandise Store', $item->getAffiliation());
        self::assertSame('SUMMER_FUN', $item->getCoupon());
        self::assertSame('USD', $item->getCurrency());
        self::assertSame(2.22, $item->getDiscount());
        self::assertSame(0, $item->getIndex());
        self::assertSame('Google', $item->getItemBrand());
        self::assertSame('Apparel', $item->getItemCategory());
        self::assertSame('Adult', $item->getItemCategory2());
        self::assertSame('Shirts', $item->getItemCategory3());
        self::assertSame('Crew', $item->getItemCategory4());
        self::assertSame('Short sleeve', $item->getItemCategory5());
        self::assertSame('related_products', $item->getItemListId());
        self::assertSame('Related Products', $item->getItemListName());
        self::assertSame('green', $item->getItemVariant());
        self::assertSame('ChIJIQBpAG2ahYAR_6128GcTUEo', $item->getLocationId());
        self::assertSame(9.99, $item->getPrice());
        self::assertSame(1, $item->getQuantity());
        self::assertTrue($item->hasCustomParameter('google_business_vertical'));
        self::assertSame('retail', $item->getCustomParameter('google_business_vertical'));
    }

    private function getItem(): Item
    {
        return Item::create()
            ->setItemId('SKU1234')
            ->setItemName('Blue t-shirt')
            ->setAffiliation('Google Merchandise Store')
            ->setCoupon('SUMMER_FUN')
            ->setCurrency('USD')
            ->setDiscount(2.22)
            ->setIndex(0)
            ->setItemBrand('Google')
            ->setItemCategory('Apparel')
            ->setItemCategory2('Adult')
            ->setItemCategory3('Shirts')
            ->setItemCategory4('Crew')
            ->setItemCategory5('Short sleeve')
            ->setItemListId('related_products')
            ->setItemListName('Related Products')
            ->setItemVariant('green')
            ->setLocationId('ChIJIQBpAG2ahYAR_6128GcTUEo')
            ->setPrice(9.99)
            ->setQuantity(1)
            ->setCustomParameter('google_business_vertical', 'retail')
        ;
    }
}
