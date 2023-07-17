<?php

    class User {
        
        private $name,
                $username,
                $password,
                $email,
                $telephone;

        function __construct($name, $username, $password, $email, $telephone) {
            $this->name = $name;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->telephone = $telephone;
        }
    }

    /** 
     * permasalahan jika banyak inisiasi di banyak file kita akan ribet mencari 
     * satu per satu dan misal apabila email dan password optional 
    */
    $user1 = new User("John", "johndoe", "PASSWORD", "John@gmail.com", "098098098098");
    $user2 = new User("Jane", "janedoe", "PASSWORD", "Jane@gmail.com", "098098098098");
    $user3 = new User("Mary", "marydoe", "PASSWORD", "Mary@gmail.com", "098098098098");