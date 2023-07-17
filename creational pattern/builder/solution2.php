<?php

    class User {
        public $name;
        public $username;
        public $password;
        public $email;
        public $telephone;

        public function __construct($name = '', $username = '', $password = '', $email = '', $telephone = '') {
            $this->name = $name;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->telephone = $telephone;
        }

        function getDetails() {
            return "{$this->name} username {$this->username}";
        }
    }

    $user = new User('John', 'johndoe');
    echo json_encode($user);