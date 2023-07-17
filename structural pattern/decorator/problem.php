<?php

/**
 * menambahkan bebrapa fitur atau fungsionalitas dari fitur yang sudah ada
*/

class Product
{
    public string $name;
    public int $price;

    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    function getProduct(): array {
        return [
            'name' => $this->name,
            'price' => $this->price
        ];
    }
}

$productA = new Product('Product A', 50000);
$getProductA = $productA->getProduct();

/**
 * dan aplikasi berkembang ternyata product ini sebuah product dari hasil import
 * dari class sebelumnya tidak ada informasi pajak import
 */

$productAFromImport = array_merge($getProductA, ['tax' => 10]);
$getProductAFromImport = $productAFromImport['price'] += 20000;
$data = [
    'name' => $getProductAFromImport = $productAFromImport['name'],
    'price' => $getProductAFromImport = $productAFromImport['price'] += 20000,
    'tax' => $getProductAFromImport = $productAFromImport['tax']
];
echo json_encode($data);
  