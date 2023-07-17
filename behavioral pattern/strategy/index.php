<?php

    /**
     * untuk menentukan algoritma yang cocok untuk mengatasi sebuah problematika
    */

    /**
     * apakah suatu angka harus di konversi jadi currency atau dengan koma
     * atau dengan tipe data tanggal
    */

    interface NumericConverter
    {
        function convertNumber($number): void;
    }

    class NumberConvertion
    {
        private NumericConverter $strategy;

        function __construct($strategy) {
            $this->strategy = $strategy;
        }

        function execute($number): void {
            $this->strategy->convertNumber($number);
        }
    }

    class NumberToCurrency implements NumericConverter
    {
        function convertNumber($number): void {
            setlocale(LC_ALL, 'id_ID');
            $formattedNum = number_format($number, 2, ',', '.');
            $formattedNum = 'Rp ' . $formattedNum;
            echo $formattedNum;
            echo "<br>";
        }
    }

    class NumberToDecimal implements NumericConverter
    {
        function convertNumber($number): void {
            setlocale(LC_ALL, 'id_ID');
            $formattedNum = number_format($number, 2, ',', '.');
            echo $formattedNum;
            echo "<br>";
        }
    }

    class NumericToDate implements NumericConverter
    {
        function convertNumber($number): void {
            setlocale(LC_ALL, 'id_ID');
            $convertedDate = date('D, d M Y H:i:s', strtotime('+1 second', $number));
            echo $convertedDate;
            echo "<br>";
        }
    }

    $matauang = new NumberConvertion(new NumberToCurrency);
    $matauang->execute(100000000);

    $decimal = new NumberConvertion(new NumberToDecimal);
    $decimal->execute(50000000);

    $date = new NumberConvertion(new NumericToDate);
    $date->execute(2000000);