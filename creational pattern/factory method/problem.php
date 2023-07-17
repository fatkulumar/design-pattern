<?php

    /**
     * sebuah class atau sebuah method untuk membuat atau memproduksi sebuah object
     * berdasarkan class yang berbeda beda
    */

    class Truck {

        private $qty;
        
        function __construct($qty)
        {
            $this->qty = $qty;
        }

        function deliver() 
        {
            return "kirim {$this->qty} menggunakan truct";
        }
    }

    class Ship {

        private $qty;

        function __construct($qty)
        {
            $this->qty = $qty;
        }

        function deliver() 
        {
            return "kirim {$this->qty} menggunakan ship";
        }
    }

    $type = 'deliver_by_land';
    if ($type == 'deliver_by_land') {
        new Truck(100);
    } else if ($type = 'deliver_by_sea') {
        new Ship(100);
    }

    $truct = new Truck(100);
    echo $truct->deliver();