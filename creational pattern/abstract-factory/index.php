<?php

    /** abstract factory berkeja sebagai super factory berfungsi untuk membuat factory lain */

    /**
     * mau beli computer atau laptop
     * kalau mau beli computer pilih ips atau led
     * kalau mau beli laptop  pilih ips atau led
    */ 

    $computerType = [
        'pc' => 'pc',
        'laptop' => 'laptop'
    ];

    abstract class Computer {
        protected $computerType;
        protected $monitor;

        function __construct($computerType, $monitor) {
            $this->computerType = $computerType;
            $this->monitor = $monitor;
        }

        abstract function getModel(): string;
    }

    class Pc extends Computer {
        function __construct($monitor) {
            parent::__construct('pc', $monitor);
        }

        function getModel(): string {
            return $this->computerType . ' with ' . $this->monitor;
        }
    }

    class Laptop extends Computer {
        function __construct($monitor) {
            parent::__construct('laptop', $monitor);
        }

        function getModel(): string {
            return $this->computerType . ' with ' . $this->monitor;
        }
    }

    $monitorType = [
        'led' => 'led',
        'ips' => 'ips'
    ];

    class LedComputerFactory {
        static function buildComputer($computerType): Computer {

            global $monitorType;
            
            switch ($computerType) {
                case 'pc':
                    return new Pc($monitorType['led']);

                case 'laptop':
                    return new Laptop($monitorType['led']);
                
                default:
                    throw new Exception('Type not found');
            }
        }
    }

    class IpsComputerFactory {
        static function buildComputer($computerType): Computer {

            global $monitorType;

            switch ($computerType) {
                case 'pc':
                    return new Pc($monitorType['ips']);

                case 'laptop':
                    return new Laptop($monitorType['ips']);
                
                default:
                    throw new Exception('Type not found');
            }
        }
    }

    class ComputerFactory {
        static function buildComputer($computerType, $monitorType): Computer {
            switch ($monitorType) {
                case 'led':
                    return LedComputerFactory::buildComputer($computerType);
                    break;
                
                case 'ips':
                    return IpsComputerFactory::buildComputer($computerType);
                    break;
                
                default:
                    throw new Exception('Type not found');
            }
        }
    }

    $pcled = ComputerFactory::buildComputer($computerType['laptop'], $monitorType['led']);
    $pcips = ComputerFactory::buildComputer($computerType['laptop'], $monitorType['ips']);
    echo $pcled->getModel() . "<br>";
    echo $pcips->getModel();

    


