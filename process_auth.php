<?php

    require_once("globals.php");
    require_once("connection.php");
    require_once("model/User.php");
    require_once("model/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    $user_dao = new UserDao($conn, $BASE_URL, $message);
    $type = filter_input(INPUT_POST, "type");

    if($type === "register"){
        $name = filter_input(INPUT_POST, "name");
        $last_name = filter_input(INPUT_POST, "last_name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirm_password = filter_input(INPUT_POST, "confirm_password");

        if($name && $last_name && $email && $password){
            if($password === $confirm_password){
                if($user_dao->find_by_email($email) === false){
                    $user = new User();
                    $user->setToken($user->generate_token());
                    $user->setPassword($user->generate_passowrd($password));
                    $user->setEmail($email);
                    $user->setName($name);
                    $user->setLast_name($last_name);
                    $user_dao->create_user($user, true);
                }
                else{
                    $message->set_message("Usuário já cadastrado, tente outro e-mail.", "alert-danger", "back");
                }
            }   
            else{
                $message->set_message("A confirmação de senha está incorreta.", "alert-danger", "back");
            }
        }
        else{
            $message->set_message("Por favor, preencha todos os campos.", "alert-danger", "back");
        }
    }   
    else if($type === "login"){

    }

?>