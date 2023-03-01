<?php

    require_once("model/User.php");
    class UserDao implements UserDAOInterface{

        public PDO $conn;
        public $url;
        public $message;

        public function __construct(PDO $conn, $url, $message) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message( $url);
        }
          
        public function create_user(User $user, $auth_user = false){
            $stmt = $this->conn->prepare("INSERT INTO USERS(
                name, last_name, email, password, token) 
                VALUES (
                :name, :last_name, :email, :password, :token)");
            $stmt->bindValue(":name", $user->getName());
            $stmt->bindValue(":last_name", $user->getLast_name());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":token", $user->getToken());
            $stmt->execute();

            if($auth_user){
                $this->set_token_to_session($user->getToken(), true);
            }
        }
        public function update_user(User $user){
            
        }
        public function verify_token($protected = false){
            
        }
        public function set_token_to_session($token, $redirect = true){
            $_SESSION['token'] = $token;
            if($redirect){
                $this->message->set_message("Seja bem vindo!", "alert-success", "edit_profile.php");
            }
        }
        public function authenticate_user($email, $password){
            
        }
        public function find_by_email($email){
            $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = new User;
                $user->build_user($data);
                return $user;
            }
            
            return false;
        }
        public function find_by_id($id){
            
        }
        public function find_by_token($token){
            
        }
        public function change_password(User $user){
            
        }
    }

?>