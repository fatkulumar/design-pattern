<?php

    namespace desoratorSolution;

    interface IProduct
    {
        function getProduct();
    }

    class Product implements IProduct
    {

        public string $name;
        public int $price;
    
        function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }
    
        function getProduct() {
            return [
                'name' => $this->name,
                'price' => $this->price
            ];
        }
    }

    abstract class ProductDecorator implements IProduct
    {
        protected Product $product;

        function __construct($product) {
            $this->product = $product;
        }

        abstract function getProduct();
    }

    class ProductImportDecorator extends ProductDecorator
    {
        function getProduct() {
           
            return [
                'name' => $this->product->name,
                'price' => $this->product->price,
                'tax' => 10000
            ];
        }
    }

    class ProductExportDecorator extends ProductDecorator
    {
        function getProduct() {
            return [
                'name' => $this->product->name,
                'price' => $this->product->price,
                'tax' => 2000
            ];
        }
    }

    $productA = new Product('Product A', 50000);
    $productAFromImport = new ProductImportDecorator($productA);
    $data = [
        'data' => $productAFromImport->getProduct()
    ];
    echo json_encode($data);