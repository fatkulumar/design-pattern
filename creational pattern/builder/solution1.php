<?php

    namespace builderSolution;

    class User {

        public $name = "",
                $username = "",
                $password = "",
                $email = "",
                $telephone = "";

    }

    class UserBuilder {
        private User $user;

        function __construct() {
            $this->user  = new User();
        }


        function setName($name) {
            $this->user->name = $name;
            return $this;
        }

        function getName()
        {
            return $this->user->name;
        }

        function setUsername($username) {
            $this->user->username = $username;
            return $this;
        }

        function setPassword($password) {
            $this->user->password = $password;
            return $this;
        }

        function setEmail($email) {
            $this->user->email = $email;
            return $this;
        }

        function setTelephone($telephone) {
            $this->user->telephone = $telephone;
            return $this;
        }

        function build() {
            return $this->user;
        }
    }

    $user = (new UserBuilder())
                ->setName("John")
                ->setUsername("johndoe")
                ->build();
    echo json_encode($user);