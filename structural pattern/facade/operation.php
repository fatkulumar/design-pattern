<?php

    require_once 'solution.php';

    function calculate(): int {
        $number1 = 20;
        $number2 = 30;

        return operation($number1, $number2);
    }   

    echo calculate();