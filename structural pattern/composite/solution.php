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

 abstract class Category
 {
    public $children = [];
    public $parent = null;
    public $name;

    function __construct($name) {
        $this->name = $name;
    }

    function setParent($parent = null) {
        $this->parent = $parent;
    }

    function getParent() {
        return $this->parent;
    }

    function isComposite(): bool {
        return false;
    }

    abstract function getName(): string;
 }

 class Product extends Category
 {
    function getName(): string {
        return $this->name;
    }
 }

 class CategoryComposite extends Category
 {
    function __construct($name) {
        parent::__construct($name);
    }

    function add($category): void {
        $this->children[] = $category;
        $category->setParent($this);
    }

    function remove($category): void {
        $categoryIndex = array_search($category, $this->children);
        array_splice($this->children, $categoryIndex, 1);
        $category->setParent(null);
    }

    function isComposite(): bool {
        return true;
    }

    function getName(): string {
        return $this->name;
    }
 }

 $category = new CategoryComposite('Category');

 $computer = new CategoryComposite('Computer');
 $fashion = new CategoryComposite('Fashion');

 $pc = new CategoryComposite('PC');
 $laptop = new CategoryComposite('Laptop');
 $casing = new CategoryComposite('Case');
 $motherboard = new CategoryComposite('Motherboard');
 $peripheral = new CategoryComposite('Peripheral');
 $hardisk = new CategoryComposite('Hardisk');
 $seaggata = new CategoryComposite('Seaggata');

 $category->add($computer);
 $category->add($fashion);

 $computer->add($pc);
 $computer->add($laptop);

 $pc->add($casing);
 $pc->add($motherboard);
 $pc->add($hardisk);

 $hardisk->add($seaggata);

 $laptop->add($hardisk);

 $computerArray = convertObjectToArray($computer);

 function convertObjectToArray($obj) {
    $result = [];
    $result['name'] = $obj->getName();
    $result['children'] = [];

    foreach ($obj->children as $child) {
        $result['children'][] = convertObjectToArray($child);
    }

    return $result;
}

 echo json_encode($computerArray);