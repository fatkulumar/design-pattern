<?php

/**
 * di pakai kalau membuat struktur tree seperti satu cabang punya cabang dan dari
 * cabang anak itu punya cabang lagi dan seterusnya
 * 
 * Computer
 *      PC
 *          Case
 *          Motherboard
 *          Processor's Fan
 * Laptop
 *      Asus ROG
 *      Lenovo Thikpad Tseries
 * Peripheral
 *      HDD
 *         Seaggata !TB
 *         WD 1TB
 *      SSD
 *      Memory RAM
 *         DDR2
 *         DDR3
 *      Keyboard
 * Keyboard
 *      Mechanical
 *          Keychron
 *          Tecware
 *      Standart
 *          Logitec
 */

    class Category
    {
        public string $name;
        public $children = [];

        function __construct($name) {
            $this->name = $name;
        }
    }

    $computer = new Category('computer');

    $pc = new Category('PC');
    $pc->children = [
        new Category('case'),
        new Category('motherboard')
    ];

    $laptop = new Category('Laptop');
    $laptop->children = [
        new Category('Asus ROG'),
        new Category('Lenovo Thikpad Tseries')
    ];

    $product_computer = $computer->children = [$pc, $laptop];
    
    echo json_encode($computer);