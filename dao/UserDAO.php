<?php

    require_once("model/User.php");

    class UserDao implements UserDAOInterface{

        public PDO $conn;
        public $url;

        public function __construct(PDO $conn, $url){
            $this->$conn = $conn;
            $this->url = $url;
        }

        public function create_user(User$user, $auth_user = false){
            
        }
        public function update_user(User $user){
            
        }
        public function verify_token($protected = false){
            
        }
        public function set_token_to_session($token, $redirect = true){
            
        }
        public function authenticate_user($email, $password){
            
        }
        public function find_by_email($email){
            
        }
        public function find_by_id($id){
            
        }
        public function find_by_token($token){
            
        }
        public function change_password(User $user){
            
        }
    }

?>