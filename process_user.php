<?php

    require_once("globals.php");
    require_once("connection.php");
    require_once("model/User.php");
    require_once("model/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    $user_dao = new UserDao($conn, $BASE_URL, $message);
    $type = filter_input(INPUT_POST, "type");

    if($type === "update"){
        $user_data = $user_dao->verify_token();
        $user_data->setName(filter_input(INPUT_POST, "name"));
        $user_data->setLast_name(filter_input(INPUT_POST, "last_name"));
        $user_data->setEmail(filter_input(INPUT_POST, "email"));
        $user_data->setBio(filter_input(INPUT_POST, "bio"));

        if(isset($_FILES['image']) && ! empty($_FILES['image']['tmp_name'])){
            $image = $_FILES['image'];
            $image_type = ["image/png", "image/jpg", "image/jpeg"];
            $image_type_jpg = ["image/jpg", "image/jpeg"];

            if(in_array($image['type'], $image_type)){

                if(in_array($image['type'], $image_type_jpg)){
                    $image_file = imagecreatefromjpeg($image['tmp_name']);
                }
                else{
                    $image_file = imagecreatefrompng($image['tmp_name']);
                }

                $image_name = $user_data->image_generate_name();
                imagejpeg($image_file, "./img/users/" . $image_name, 100);
                $user_data->setImage($image_name);

            }
            else{
                $message->set_message("Tipo inválido de imagem, insira uma imagem png, jpg ou jpeg.", "alert-danger", "back");
            }
        }
        $user_dao->update_user($user_data);
    }
    else if($type === "change_password"){
        $password = filter_input(INPUT_POST, "password");
        $confirm_password = filter_input(INPUT_POST, "confirm_password");
        
        if($password && $confirm_password){
            if($confirm_password == $password){
                $user = $user_dao->verify_token();
                $user->setId($id);
                $user->setPassword($user->generate_passowrd($password));
                $user_dao->change_password($user);
            }
            else{
                $message->set_message("As senhas não são iguais.", "alert-danger", "back");
            }
        }
        else{
            $message->set_message("Por favor, preencha todos os campos.", "alert-danger", "back");
        }
    }
    else{
        $message->set_message("Informações inválidas!", "alert-danger", "index.php");
    }

?>