<?php

    class User{
        private $id;
        private $name;
        private $last_name;
        private $email;
        private $password;
        private $image;
        private $bio;
        private $token;

        
        public function getId() {
            return $this->id;
        }
        
        public function setId($id): self {
            $this->id = $id;
            return $this;
        }
        
        
        public function getName() {
            return $this->name;
        }
        
        public function setName($name): self {
            $this->name = $name;
            return $this;
        }
        
        
        public function getLast_name() {
            return $this->last_name;
        }

        public function setLast_name($last_name): self {
            $this->last_name = $last_name;
            return $this;
        }
        
        
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email): self {
            $this->email = $email;
            return $this;
        }
        
        
        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password): self {
            $this->password = $password;
            return $this;
        }
        
        
        public function getImage() {
            return $this->image;
        }
        
        public function setImage($image): self {
            $this->image = $image;
            return $this;
        }
        
        
        public function getBio() {
            return $this->bio;
        }
        
        public function setBio($bio): self {
            $this->bio = $bio;
            return $this;
        }
        
        public function getToken() {
            return $this->token;
        }


        public function setToken($token): self {
            $this->token = $token;
            return $this;
        }
    }

    interface UserDAOInterface{
        
    }
?>