<?php

    /**
     * memungkinkan sebuah object untuk menotifikasi ke object lain saat ada perubahan state 
    */

    interface Subject
    {
        function attach($observer): void;
        function detach($observer): void;
        function notify(): void;
    }

    interface Observer
    {
        function getName(): string;
        function update(Subject $subject): void;
    }

    class PromoSubject implements Subject
    {
        public bool $isPromo = false;
        private array $observers = [];

        function attach($observer): void {
            $isExist = in_array($observer, $this->observers, true);
            if($isExist) {
                echo "Observer {$observer->name} sudah ada" . PHP_EOL;
                echo "<br>";
                return;
            }
            $this->observers[] = $observer;
            echo "Observer {$observer->name} berhasil didaftarkan" . PHP_EOL;
            echo "<br>";
        }

         function detach($observer): void
         {
            $observerIndex = array_search($observer, $this->observers, true);
            if($observerIndex === -1) {
                echo "Observer {$observer->name} sudah ada";
                echo "<br>";
                return;
            }

            array_splice($this->observers, $observerIndex, 1);
            echo "Observer {$observer->name} berhasil dihapus" . PHP_EOL;
            echo "<br>";
            return;
         }

         function notify(): void {
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
         }

         function setPromo($status) {
            $this->isPromo = $status;
            $this->notify();
         }
    }

    class Product implements Observer
    {
        public string $name;

        function __construct($name) {
            $this->name = $name;
        }

        function getName(): string
        {
            return $this->name;
        }

        function update(Subject $subject): void
        {
            if ($subject instanceof PromoSubject && $subject->isPromo) {
                echo "Product {$this->name} di tanyakan di toko online sebagai product promo";
                echo "<br>";
            }
        }
    }

    $promo = new PromoSubject();
    $baju = new Product('baju');
    $celana = new Product('celana');
    $topi = new Product('topi');

    $promo->attach($baju);
    $promo->attach($celana);
    $promo->attach($topi);
    $promo->detach($topi);

    $promo->setPromo(true);

    echo $promo;