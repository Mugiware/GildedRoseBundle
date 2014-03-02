<?php

namespace Mugiware\GildedRoseBundle\Tests;

use \PHPUnit_Framework_TestCase;
use Mugiware\GildedRoseBundle\Entity\Item;
use Mugiware\GildedRoseBundle\Utility\Updater;

class StandardTest extends PHPUnit_Framework_TestCase
{
    public function testDecrementSellIn()
    {
        $item = new Item();
        $item->setName('Standard item');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getSellIn(), 0);
    }

    public function testDecrementQuality()
    {
        $item = new Item();
        $item->setName('Standard item');
        $item->setSellIn(1);
        $item->setQuality(1);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 0);
    }

    public function testDecrementQualityTwiceWhenExpired()
    {
        $item = new Item();
        $item->setName('Standard item');
        $item->setSellIn(0);
        $item->setQuality(2);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 0);
    }

    public function testQualityNeverNegative()
    {
        $item = new Item();
        $item->setName('Standard item');
        $item->setSellIn(0);
        $item->setQuality(0);
        $items = array($item);
        Updater::updateQuality($items);
        $this->assertEquals($item->getQuality(), 0);
    }
}
