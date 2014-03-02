<?php

namespace Mugiware\GildedRoseBundle\Entity;

/**
 * @ORM\Entity(repositoryClass="Mugiware\GildedRoseBundle\Entity\Item")
 * @ORM\Table(name="MugiwareGildedRosePlan")
 */
class Item {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sellIn;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quality;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get sellIn
     *
     * @return integer
     */
    public function getSellIn()
    {
        return $this->sellIn;
    }

    /**
     * Set sellIn
     *
     * @param integer $sellIn
     * @return Item
     */
    public function setSellIn($sellIn)
    {
        $this->sellIn = $sellIn;
        return $this;
    }

    /**
     * Get quality
     *
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     * @return Item
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

}
