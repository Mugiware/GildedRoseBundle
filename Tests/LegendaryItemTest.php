<?php

namespace Mugiware\GildedRoseBundle\Tests;

use \PHPUnit_Framework_TestCase;
use Mugiware\GildedRoseBundle\Entity\Item;
use Mugiware\GildedRoseBundle\Utility\Updater;

class LegendaryItemTest extends PHPUnit_Framework_TestCase
{
    public function testNeverDecreaseQuality()
    {
        $item = new Item();
        $item->setName('Sulfuras, Hand of Ragnaros');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 1);
    }

    public function testNeverDecreaseSellIn()
    {
        $item = new Item();
        $item->setName('Sulfuras, Hand of Ragnaros');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getSellIn(), 1);
    }
}
