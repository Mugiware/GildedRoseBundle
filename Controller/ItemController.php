<?php

namespace Mugiware\GildedRoseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mugiware\GildedRoseBundle\Entity\Item;

class ItemController extends Controller {

    protected function updateQuality(array $items)
    {
        foreach ($items as $item) {
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
                            if ($items->getQuality() < 50) {
                                $items->setQuality($items->getQuality() + 1);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($items->getQuality() < 50) {
                                $items->setQuality($items->getQuality() + 1);
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
                    if ($item->getName != 'Backstage passes to a TAFKAL80ETC concert') {
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
                        $item->setQuality($item->getQuality() - 1);
                    }
                }
            }
        }
    }

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
        return $this->render(
            'MugiwareGildedRoseBundle:Item:index.html.twig',
            array('items' => $items)
        );
    }

}
