<?php

    /**
     * untuk membatasu supaya object tidak di inisiasi lebih dari satu kali
     * kegunaanya untuk menjadi global variable dan bisa menghemat penggunaan memory
    */

    /** case get data login */
    class Me
    {
        private $first_name = "",
                $last_name = "";
        
        function getFullName() {
            $this->first_name = 'Fatkul'; /** data seolah seolah dari database */
            $this->last_name = 'Umar'; /** data seolah seolah dari database */
            return "{$this->first_name} {$this->last_name}";
        }
    }
     
    /** kalau kita inisiasi pasti ambil data dari database */
    $full_name1 = new Me();
    echo $full_name1->getFullName();
    /** kemudian seolah olah kita inisiasi kelas lagi di file lain */
    $full_name2 = new Me();
    echo $full_name2->getFullName();
    /** cek apakah class yang terinisiasi itu sama */
    echo $full_name1 === $full_name2;
    
    /**
     * untuk membatasi supaya object tidak di inisiasi lebih dari satu kali
     * tunjuannya untuk di jadikan global variable
     * manfaat nya lebih hemat permakaian memory
    */