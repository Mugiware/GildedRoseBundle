<?php

namespace Mugiware\GildedRoseBundle\Tests;

use \PHPUnit_Framework_TestCase;
use Mugiware\GildedRoseBundle\Entity\Item;
use Mugiware\GildedRoseBundle\Utility\Updater;

class QualityAgedItemTest extends PHPUnit_Framework_TestCase
{
    public function testDecrementSellIn()
    {
        $item = new Item();
        $item->setName('Aged Brie');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getSellIn(), 0);
    }

    public function testIncreaseQuality()
    {
        $item = new Item();
        $item->setName('Aged Brie');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 2);
    }

    public function testQualityNeverMoreThanFifty()
    {
        $item = new Item();
        $item->setName('Aged Brie');
        $item->setSellIn(1);
        $item->setQuality(50);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 50);
    }

    public function testQualityIncreaseTwiceAfterSellIn()
    {
        $item = new Item();
        $item->setName('Aged Brie');
        $item->setSellIn(0);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 3);
    }
}
