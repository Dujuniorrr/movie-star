<?php

    require_once("model/User.php");
    class UserDao implements UserDAOInterface{

        public PDO $conn;
        public $url;
        public $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message( $url);
        }
          
        public function create_user(User $user, $auth_user = false){
            $image = "user.png";
            $stmt = $this->conn->prepare("INSERT INTO USERS(
                name, last_name, email, password, token, image) 
                VALUES (
                :name, :last_name, :email, :password, :token, :image)");
            $stmt->bindValue(":name", $user->getName());
            $stmt->bindValue(":last_name", $user->getLast_name());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":token", $user->getToken());
            $stmt->bindValue(":image", $image);
            $stmt->execute();

            if($auth_user){
                $this->set_token_to_session($user->getToken(), true);
            }
        }

        public function update_user(User $user, $redirect = true){
            $stmt = $this->conn->prepare("UPDATE USERS SET name = :name, last_name = :last_name, email = :email, token = :token, image = :image, bio = :bio WHERE id = :id");
            $stmt->bindValue(":name", $user->getName());
            $stmt->bindValue(":last_name", $user->getLast_name());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":token", $user->getToken());
            $stmt->bindValue(":image", $user->getImage());
            $stmt->bindValue(":bio", $user->getBio());
            $stmt->bindValue(":id", $user->getId());
            $stmt->execute();

            if($redirect){
                $this->message->set_message('Dados atualizados com sucesso!', "alert-success", "edit_profile.php");
            }
        }

        public function verify_token($protected = false){
            if(!empty($_SESSION['token'])){
                $token = $_SESSION['token'];
                $user = $this->find_by_token($token);
                if($user){
                    return $user;
                }
                else if($protected){
                    $this->message->set_message('Faça autenticação para acessar essa página', "alert-danger");
                }
            }
            else if($protected){
                $this->message->set_message('Faça autenticação para acessar essa página', "alert-danger");
            }
        }

        public function set_token_to_session($token, $redirect = true){
            $_SESSION['token'] = $token;
            if($redirect){
                $this->message->set_message("Seja bem vindo!", "alert-success", "edit_profile.php");
            }
        }
        
        public function authenticate_user($email, $password){
            $user = $this->find_by_email($email);
            if($user){
                if(password_verify($password, $user->getPassword())){
                    $token = $user->generate_token();
                    $this->set_token_to_session($token, false);
                    $user->setToken($token);
                    $this->update_user($user, false);
                    return true;
                }
            }
            return false;
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
            $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = new User;
                $user->build_user($data);
                return $user;
            }
            
            return false;
        }
        public function find_by_token($token){
            $stmt = $this->conn->prepare("SELECT * FROM USERS WHERE token = :token");
            $stmt->bindParam(":token", $token);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                $user = new User;
                $user->build_user($data);
                return $user;
            }
            
            return false;
        }

        public function destroy_token(){
            $_SESSION['token'] = '';
            $this->message->set_message("Você fez o logout com sucesso.", "alert-success", 'index.php');
        }
        
        public function change_password(User $user){
            $stmt = $this->conn->prepare("UPDATE USERS SET password = :password WHERE id = :id");
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":id", $user->getId());
            $stmt->execute();
            $this->message->set_message("Senha alterada com sucesso!", "alert-success", "back");
        }
    }

?>