<?php

    /**
     * protorype adalah metode pattern yang bisa clone object yang sudah diinisiasi 
    */

    class User {
            
        public $name,
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

        function clone(): self {
            $clone = (object) $this;
            return clone $clone;
        }
    }

    $user1 = new User("John", "johndoe", "PASSWORD", "John@gmail.com", "098098098098");
    
    $user2 = $user1->clone();
    $user2->name = "Rubah Nama";
    echo json_encode($user2);