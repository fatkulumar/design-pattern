<?php

    function operation($number1, $number2): int {
        $operation1 = $number1 + $number2;
        $operation2 = $operation1 / 100;
        $operation3 = $operation2 * 25;

        return $operation3;
    }