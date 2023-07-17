<?php
    
    interface Logistic {
        function deliver(): void;
    }

    class Truck implements Logistic {

        private $qty;
        
        function __construct($qty)
        {
            $this->qty = $qty;
        }

        function deliver(): void
        {
            echo "kirim {$this->qty} menggunakan truct";
        }
    }

    class Ship implements Logistic {

        private $qty;

        function __construct($qty)
        {
            $this->qty = $qty;
        }

        function deliver(): void
        {
            echo "kirim {$this->qty} menggunakan ship";
        }
    }

    $logisticType = [
        "type" => "deliver_by_ship",
        "qty" => 0
    ];

    interface Factory {
        function create($logisticType): Logistic;
    }

    class LogisticFactory implements Factory {
        function create($logisticType): Logistic {
            if($logisticType['type'] == 'deliver_by_land') {
                return new Truck($logisticType['qty']);
            } else if ($logisticType['type'] == 'deliver_by_sea') {
                return new Ship($logisticType['qty']);
            }

            new Exception('class tidak tersedia');
        }
    }

    $logistic = new LogisticFactory();

    $byLand = $logistic->create([
        "type" => "deliver_by_land",
        "qty" => 100
    ]);

    echo $byLand->deliver(); 