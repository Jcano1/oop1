<?php

    namespace App\School\Entities;

     class User{
     

        private string $email;
        private string $username;
        private string $last_name;
        private string $usertipe;
        private string $password;
        private ?\DateTime $createdAt=null;
        private ?\DateTime $updatedAt=null;


        function __construct($username,$email,$password,$last_name,$usertipe){
            $this->email=$email;
            $this->username=$username;
            $this->password=password_hash($password,2);
            $this->last_name=$last_name;
            $this->usertipe=$usertipe;

        }

        function setEmail(string $email){
            $this->email=$email;
        }

        function getEmail(){
            return $this->email;
        }

        public function getUsername()
        {
                return $this->username;
        }

        public function getPassword()
        {
                return $this->password;
        }
        public function getUsertipe()
        {
                return $this->usertipe;
        }
        public function setUsertipe($usertipe)
        {
                $this->usertipe = $usertipe;

                return $this;
        }
        public function getLast_name()
        {
                return $this->last_name;
        }
        public function setLast_name($last_name)
        {
                $this->last_name = $last_name;

                return $this;
        }
    }