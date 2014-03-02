<?php

namespace Mugiware\GildedRoseBundle\Tests;

use \PHPUnit_Framework_TestCase;
use Mugiware\GildedRoseBundle\Entity\Item;
use Mugiware\GildedRoseBundle\Utility\Updater;

class EventItemTest extends PHPUnit_Framework_TestCase
{
    public function testDecrementSellIn()
    {
        $item = new Item();
        $item->setName('Backstage passes to a TAFKAL80ETC concert');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getSellIn(), 0);
    }
    public function testIncreaseQuality()
    {
        $item = new Item();
        $item->setName('Backstage passes to a TAFKAL80ETC concert');
        $item->setSellIn(11);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 2);
    }

    public function testIncreaseQualityByTwoTenDaysOrLessBefore()
    {
        for ($i = 10; $i > 5; $i--) {
            $item = new Item();
            $item->setName('Backstage passes to a TAFKAL80ETC concert');
            $item->setSellIn($i);
            $item->setQuality(1);
            $items = array($item);
            Updater::updateQuality($items);
            $this->assertEquals($item->getQuality(), 3);
        }
    }

    public function testIncreaseQualityByThreeFiveDaysOrLessBefore()
    {
        for ($i = 5; $i > 0; $i--) {
            $item = new Item();
            $item->setName('Backstage passes to a TAFKAL80ETC concert');
            $item->setSellIn($i);
            $item->setQuality(1);
            $items = array($item);
            Updater::updateQuality($items);
            $this->assertEquals($item->getQuality(), 4);
        }
    }

    public function testQualityZeroAfterEvent()
    {
        $item = new Item();
        $item->setName('Backstage passes to a TAFKAL80ETC concert');
        $item->setSellIn(0);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 0);
    }
}
