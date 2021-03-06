<?php

namespace Mugiware\GildedRoseBundle\Utility;

class Updater
{
    public static function updateQuality(&$items)
    {
        foreach ($items as &$item) {
            if ($item->getName() != 'Aged Brie' && $item->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->getQuality() > 0) {
                    if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                        $item->setQuality($item->getQuality() - 1);
                    }
                }
            } else {
                if ($item->getQuality() < 50) {
                    $item->setQuality($item->getQuality() + 1);
                    if ($item->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getSellIn() < 11) {
                            if ($item->getQuality() < 50) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($item->getQuality() < 50) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                    }
                }
            }
            if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                $item->setSellIn($item->getSellIn() - 1);
            }
            if ($item->getSellIn() < 0) {
                if ($item->getName() != 'Aged Brie') {
                    if ($item->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getQuality() > 0) {
                            if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                                $item->setQuality($item->getQuality() - 1);
                            }
                        }
                    } else {
                        $item->setQuality($item->getQuality() - $item->getQuality());
                    }
                } else {
                    if ($item->getQuality() < 50) {
                        $item->setQuality($item->getQuality() + 1);
                    }
                }
            }
        }
    }
}
