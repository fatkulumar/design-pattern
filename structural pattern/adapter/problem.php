<?php

    /**
     * name | brand
     * mobil| Delorean
     * besi | -
     * roda | -
    */

    namespace adapterProblem;

    interface BaseData 
    {
        function getData(): array;
    }

    interface IProduct extends BaseData
    {
        function getData(): array;
    }

    interface IMaterial
    {
        public function getName(): string;
        public function getQty(): int;
    }

    class Product implements IProduct {
        private string $name;
        private string $brand;

        public function __construct($name, $brand) {
            $this->name = $name;
            $this->brand = $brand;
        }

        function getData(): array
        {
            return [
                'name' => $this->name,
                'brand' => $this->brand
            ];
        }
    }

    class Material implements IMaterial {
        private string $name;
        private int $qty;
    
        public function __construct($name, $qty) {
            $this->name = $name;
            $this->qty = $qty;
        }
        
        function getData(): array
        {
            return [
                'name' => $this->name,
                'brand' => $this->qty
            ];
        }
    
        public function getName(): string {
            return $this->name;
        }
    
        public function getQty(): int {
            return $this->qty;
        }
    }

    $list = [];

    $product = new Product('mobile', 'delorean');
    $list[] = $product->getData();

    $material1 = new Material('besi', 10);
    $list[] = $material1->getData();
    $material2 = new Material('roda', 4);
    $list[] = $material2->getData();
    echo json_encode($list);
    /** padahal expectasi kita kalau gak ada branch cetak kosong (-) */