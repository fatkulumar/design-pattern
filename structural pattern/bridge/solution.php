<?php

    /**
     *                                      store
     * 
     *          Product Type                                                      Price
     * 
     * Fashion(Price) ComputerPrice PhonePrice                                 Cheap   Expensive
    */

    interface Price
    {
        function getName(): string;
        function sellPrice(): string;
    }

    class Cheap implements Price
    {
        private $name = 'murah';
        function getName(): string {
            return $this->name;
        }

        function sellPrice(): string {
            return "Jual harga {$this->name}";
        }
    }

    class Expensive implements Price
    {
        private $name = 'mahal';
        function getName(): string {
            return $this->name;
        }

        function sellPrice(): string {
            return "Jual harga {$this->name}";
        }
    }

    interface IProduct 
    {
        function getName(): string;
    }

    abstract class Product implements IProduct
    {
        public $name;
        public Price $price;

        function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }
        
        function getName(): string {
            return $this->name;
        }

        abstract function sell(): void;
    }

    class Fashion extends Product
    {
        function sell(): void {
            echo "jual {$this->name} dengan harga {$this->price->sellPrice()}";
        }
    }

    class Computer extends Product
    {
        function sell(): void {
            echo "jual {$this->name} dengan harga {$this->price->sellPrice()}";
        }
    }

    $fashionMurah = new Fashion('baju lengan panjang', new Cheap());
    echo $fashionMurah->sell();

    echo "<br>";

    $computerMahal = new Computer('macbox 2023', new Expensive());
    echo $computerMahal->sell();