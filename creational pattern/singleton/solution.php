<?php

    class Me
    {
        private static $instance;
        private $first_name = "",
                $last_name = "";

        static function getInstance(): Me {
            if (!self::$instance) {
                self::$instance = new Me();
            }

            return self::$instance;
        }
        
        function getFullName() {
            $this->first_name = 'Fatkul'; /** data seolah seolah dari database */ 
            $this->last_name = 'Umar'; /** data seolah seolah dari database */
            return "{$this->first_name} {$this->last_name}";
        }
    }

    $profile1 = Me::getInstance();
    echo $profile1->getFullName();
    /** kemudian seolah olah kita inisiasi kelas lagi di file lain */
    $profile2 = Me::getInstance();
    echo $profile2->getFullName();
    /** cek apakah class yang terinisiasi itu sama */
    echo $full_name1 === $full_name2;