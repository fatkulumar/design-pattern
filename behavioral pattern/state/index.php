<?php

    namespace state;

    /**
     * untuk mengubah suatu perilaku obect berdasarkan state nya
     * perilaku dari object ini juga mampu mengakses object lain
     * yang telah dimasukkan di state utama
    */
    
    /**
     * misalkan kita punya toko online mempunyai fitur unggulan kita
     * karena product kita banyak kita perlu mengganti ganti product unggulan kita
     * akan repot apabila di lakukan secara manual
    */

    interface IProduct
    {
        function getName(): string;
        function saveAsFeaturedProduct(): void;
    }

    class FeaturedProduct
    {
        private IProduct $state;

        function __construct($state) {
            $this->state = $state;
        }

        function setFeaturedProduct(IProduct $state): void {
            $this->state = $state;
        }

        function getFeaturedProduct() {
            return $this->state;
        }

        function publish() {
            $this->state->saveAsFeaturedProduct();
        }
    }

    class FashionProduct implements IProduct
    {
        public string $name;

        function __construct($name) {
            $this->name = $name;
        }

        function getName(): string {
            return $this->name;
        }

        function saveAsFeaturedProduct(): void {
            echo "Set Product {$this->name} sebagai product unggulan";
            echo "<br>"; 
        }
    }

    class ElectronicProduct implements IProduct
    {
        public string $name;

        function __construct($name) {
            $this->name = $name;
        }

        function getName(): string {
            return $this->name;
        }

        function saveAsFeaturedProduct(): void {
            echo "Set Product {$this->name} sebagai product unggulan";
            echo "<br>"; 
        }
    }

    $baju = new FashionProduct('baju');
    $celana = new FashionProduct('celana');
    $keyboard = new FashionProduct('keyboard');

    $featureProduct = new FeaturedProduct($baju);
    $featureProduct->publish();
    $featureProduct->getFeaturedProduct();

    $featureProduct->setFeaturedProduct($keyboard);
    $featureProduct->publish();
    $featureProduct->getFeaturedProduct();
