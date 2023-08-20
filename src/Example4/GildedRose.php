<?php

declare(strict_types=1);

namespace Idealista\PropertyBasedTestingWorkshop\Example4;

use Psl\Collection\MutableVector;
use Psl\Collection\MutableVectorInterface;

final readonly class GildedRose
{
    public const NAME_SULFURAS = "Sulfuras, Hand of Ragnaros";

    public const NAME_BRIE = "Aged Brie";

    public const NAME_BACKSTAGE_PASS = "Backstage passes to a TAFKAL80ETC concert";

    /**
     * @param MutableVectorInterface<Item> $items
     */
    public function __construct(
        private MutableVectorInterface $items = new MutableVector([]),
    )
    {
    }

    public function updateQuality(): void
    {
        $this->items->map(function (Item $item) {
            if ($item->name !== self::NAME_BRIE) {
                if ($item->name !== self::NAME_BACKSTAGE_PASS) {
                    if ($item->quality > 0) {
                        if ($item->name !== self::NAME_SULFURAS) {
                            $item = $item->with(quality: $item->quality - 1);
                        }
                    }
                }
            } elseif ($item->quality < 50) {
                $item = $item->with(quality: $item->quality + 1);

                if ($item->name === self::NAME_BACKSTAGE_PASS) {
                    if ($item->sellIn < 11) {
                        if ($item->quality < 50) {
                            $item = $item->with(quality: $item->quality + 1);
                        }
                    }

                    if ($item->sellIn < 6) {
                        if ($item->quality < 50) {
                            $item = $item->with(quality: $item->quality + 1);
                        }
                    }
                }
            }

            if ($item->name !== self::NAME_SULFURAS) {
                $item = $item->with(sellIn: $item->sellIn - 1);
            }

            if ($item->sellIn < 0) {
                if ($item->name !== self::NAME_BRIE) {
                    if ($item->name !== self::NAME_BACKSTAGE_PASS) {
                        if ($item->quality > 0) {
                            if ($item->name !== self::NAME_SULFURAS) {
                                $item = $item->with(quality: $item->quality - 1);
                            }
                        }
                    } else {
                        $item = $item->with(quality: $item->quality - $item->quality);
                    }
                } else {
                    if ($item->quality < 50) {
                        $item = $item->with(quality: $item->quality + 1);
                    }
                }
            }

            return $item;
        });
    }
}
