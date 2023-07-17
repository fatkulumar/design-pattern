<?php

    class Product
    {
        public string $name;
        public int $price;
        public int $weight;

        function __construct($name, $price, $weight) {
            $this->name = $name;
            $this->price = $price;
            $this->weight = $weight;
        }
    }

    interface Handler
    {
        function setNext(Handler $handler): Handler;
        function handle($request);
    }

    abstract class AbstractProductHandler implements Handler
    {
        private ?Handler $nextHandler = null;

        function setNext(Handler $handler): Handler {
            $this->nextHandler = $handler;
            return $handler;
        }

        function handle($request) {
            if($this->nextHandler) {
                return $this->nextHandler->handle($request);
            }

            return $request;
        }
    }

    class ProductNameHandler extends AbstractProductHandler
    {
        function handle($request) {
            if(strlen($request->name) > 20) {
                return 'nama harus di bawah 20 karakter';
            }

            return parent::handle($request);
        }
    }

    class ProductPriceHandler extends AbstractProductHandler
    {
        function handle($request) {
            if($request->price > 1000000) {
                return 'harga harus di bawah 1000000 juta';
            }

            return parent::handle($request);
        }
    }

    class ProductWeightHandler extends AbstractProductHandler
    {
        function handle($request) {
            if($request->weight > 5) {
                return 'harga harus di bawah 5 kilo';
            }

            return parent::handle($request);
        }
    }

    $product1 = new Product('A', 30000, 7);
    $product2 = new Product('B', 1200000, 2);
    $product3 = new Product('C', 250, 4);

    $nameHandler = new ProductNameHandler();
    $priceHandler = new ProductPriceHandler();
    $weightHandler = new ProductWeightHandler();

    $nameHandler->setNext($priceHandler)->setNext($weightHandler);

    $getProduct1 = $nameHandler->handle($product1);
    echo json_encode($getProduct1);
    $getProduct2 = $nameHandler->handle($product2);
    echo json_encode($getProduct2);
    $getProduct3 = $nameHandler->handle($product3);
    echo json_encode($getProduct3);