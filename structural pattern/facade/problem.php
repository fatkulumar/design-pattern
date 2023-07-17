<?php

    /**
     * Berfungsi untuk membungkus logic yang komplek ke dalam satu class tersendiri
     * atau file tersendiri yang mana nantinya class ini bisa di pakai class lain
    */

    function calculate1(): int {
        $number1 = 20;
        $number2 = 30;

        $operation1 = $number1 + $number2;
        $operation2 = $operation1 / 100;
        $operation3 = $operation2 * 25;

        return $operation3;
    }

    function calculate2(): int {
        $number1 = 10;
        $number2 = 5;

        $operation1 = $number1 + $number2;
        $operation2 = $operation1 / 100;
        $operation3 = $operation2 * 25;

        return $operation3;
    }

    /**
     * kalau kita lihat ada satu operasi yang sama di setiap function
     * sebenernya kita bisa memasukkan kedalah satu function
    */