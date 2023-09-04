<?php
class Product
{
    private $id_flower;
    private $name_flower;
    private $price_flower;
    private $amount_flower;
    public function __construct($id_flower, $name_flower, $amount_flower, $price_flower)
    {
        $this->id_flower = $id_flower;
        $this->name_flower = $name_flower;
        $this->price_flower = $price_flower;
        $this->amount_flower = $amount_flower;
    }
    public function getIdFlower()
    {
        return $this->id_flower;
    }
    public function getNameFlower()
    {
        return $this->name_flower;
    }
    public function getAmountFlower()
    {
        return $this->amount_flower;
    }
    public function getPriceFlower()
    {
        return $this->price_flower;
    }
    public function setAmountFlower($amount_flower)
    {
        return $this->amount_flower = $amount_flower;
    }
}
