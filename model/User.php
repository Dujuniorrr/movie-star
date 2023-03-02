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

        public function build_user($data){
            $this->setId($data['id']);
            $this->setName($data['name']);
            $this->setLast_name($data['last_name']);
            $this->setEmail($data['email']);
            $this->setPassword($data['password']);
            $this->setImage($data['image']);
            $this->setBio($data['bio']);
            $this->setToken($data['token']);
        }

        public function image_generate_name(){
            return bin2hex(random_bytes(60)) . ".jpg";
        }
        public function get_full_name(){
            return $this->getName() . " " . $this->getLast_name();
        }
        
        public function generate_token(){
            return bin2hex(random_bytes(50));
        }

        public function generate_passowrd($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }
        
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
        
        public function create_user(User$user, $auth_user = false);
        public function update_user(User $user, $redirect = true);
        public function verify_token($protected = false);
        public function set_token_to_session($token, $redirect = true);
        public function authenticate_user($email, $password);
        public function find_by_email($email);
        public function find_by_id($id);
        public function find_by_token($token);
        public function destroy_token();
        public function change_password(User $user);

    }
?>