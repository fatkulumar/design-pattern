<?php

    /**
     * sebagai jembatan antar class
    */

    /**
     * ojek1    ojek2   ojek3   ojek4
     * 
     * 
     *              App
     *   Penumpang 1    Penumpang 2
    */

    interface IProduct
    {
        function getName(): string;
        function sell(): void;
    }

    interface IMediator 
    { 
        function registerProduct(IProduct $product): void;
        function registeredProduct(): void;
        function setAvaliableStatus($status): void;
        function isAvailable(): bool;
    }

    class Product implements IProduct
    {
        public string $name;
        public IMediator $mediator;

        function __construct($name, $mediator) {
            $this->name = $name;
            $this->mediator = $mediator;
        }

        function getName(): string
        {
             return $this->name;
        }

        function sell(): void {
            if($this->mediator->isAvailable()) {
                $this->mediator->setAvaliableStatus(false);
                echo "Product {$this->name} sudah di jual";
                echo "<br>";
            } else {
                echo "Product ini belum dijual, harus didaftarkan terlebih dahulu";
                echo "<br>";
            }
        }
    }

    class ProductMediator implements IMediator
    {
        public ?Product $product;
        public bool $status = false;

        function registeredProduct(): void {
            if ($this->status) {
                echo $this->product;
                echo "<br>";
            } else {
                echo "tidak ada product yang dijual";
                echo "<br>";
            }
        }

        function registerProduct(IProduct $product): void
        {
            if ($this->status) {
                echo "tidak bisa mendaftarkan product karena masih ada product yang masih belum terjual";
                echo "<br>";
            } else {
                $this->product = $product;
                $this->status = true;
                echo "product berhasil didaftarkan";
                echo "<br>";
            }
        }

        function setAvaliableStatus($status): void
        {
            $this->status = $status;
        }

        function isAvailable(): bool
        {
            return $this->status;
        }
    }

    $mediator = new ProductMediator();
    $product1 = new Product('Sabun', $mediator);
    $product2 = new Product('Sampo', $mediator);
    $mediator->registerProduct($product1);
    $mediator->registerProduct($product2);

    $product1->sell();
    $product2->sell();

    $mediator->registerProduct($product2);
    $mediator->registeredProduct();
   

