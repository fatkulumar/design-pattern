<?php

    /**
     * name | brand
     * mobil| Delorean
     * besi | -
     * roda | -
    */

    namespace adapterSolution2;

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
        public string $name;
        public string $brand;

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
    
    /** padahal expectasi kita kalau gak ada branch cetak kosong (-) */

    $adapterType = [
        'product' => 'product',
        'material' => 'material'
    ];

    class DataAdapter implements BaseData
    {
        public $name,
                $brand,
                $qty,
                $type;

        function __construct($name, $brand, $qty, $adapterType) {
            $this->name = $name;
            $this->brand = $brand;
            $this->qty = $qty;
            $this->type = $adapterType;
        }

        function getData(): array {
            global $adapterType;
            if ($this->type == $adapterType['product']) {
                $product = new Product($this->name, $this->brand);
                return [
                    'name' => $product->name,
                    'brand' => $product->brand
                ];
            } else if ($this->type == $adapterType['material']) {
                $product = new Material($this->name, $this->qty);
                return [
                    'name' => $this->name,
                    'brand' => "",
                ];
            }

            return [
                'name' => "",
                'brand' => "",
            ];
        }
    }

    $list = [];

    $product = new DataAdapter('mobil', 'doloreans', 0 , $adapterType['product']);
    $list[] = $product->getData();

    $product = new DataAdapter('besi', 'doloreans', 10, $adapterType['material']);
    $list[] = $product->getData();
    echo json_encode($list);