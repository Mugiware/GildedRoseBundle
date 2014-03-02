<?php

namespace Mugiware\GildedRoseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mugiware\GildedRoseBundle\Entity\Item;
use Mugiware\GildedRoseBundle\Utility\Updater;

class ItemController extends Controller
{
    public function indexAction()
    {
        $items = array();
        $db = array(
            array(
                'name' => '+5 Dexterity Vest',
                'sellIn' => 10,
                'quality' => 20,
            ),
            array(
                'name' => 'Aged Brie',
                'sellIn' => 2,
                'quality' => 0,
            ),
            array(
                'name' => 'Elixir of the Mongoose',
                'sellIn' => 5,
                'quality' => 7,
            ),
            array(
                'name' => 'Sulfuras, Hand of Ragnaros',
                'sellIn' => 0,
                'quality' => 80,
            ),
            array(
                'name' => 'Backstage passes to a TAFKAL80ETC concert',
                'sellIn' => 15,
                'quality' => 20,
            ),
            array(
                'name' => 'Conjured Mana Cake',
                'sellIn' => 3,
                'quality' => 6,
            ),
        );
        foreach ($db as $row) {
            $item = new Item();
            $item->setName($row['name']);
            $item->setSellIn($row['sellIn']);
            $item->setQuality($row['quality']);
            $items[] = $item;
        }
        Updater::updateQuality($items);
        return $this->render(
            'MugiwareGildedRoseBundle:Item:index.html.twig',
            array('items' => $items)
        );
    }
}
