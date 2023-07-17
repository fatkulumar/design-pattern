<?php

    /**
     * sebuah pattern untuk melakukan chaining pada beberapa object
     * biasa untuk memvalidasi data secara terpisah
     * contoh data sebelum masuk ke database kita cek dulu property nya
     * sudah sesuai dengan harapan atau belum
    */

    /**
     * nama < 20 karakter
     * harga < 1jt
     * berat < 5kg
    */

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

        function validate(): string {
            if($this->name > 20) {
                return 'nama harus di bawah 20 karakter';
            }

            if($this->price > 10000000) {
                return 'harga harus di bawah 1jt';
            }

            if($this->weight > 5) {
                return 'berat harus di bawah 5kg';
            }
        }
    }

    $product = new Product('sabun', 20000, 2);
    echo $product->validate();

    /**
     * sebenernya validasi ini tidak ada masalah
     * namun akan menjadi masalah ketika validasinhya menjadi komplek
    */

