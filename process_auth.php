<?php

    require_once("globals.php");
    require_once("connection.php");
    require_once("model/User.php");
    require_once("model/Message.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);

    $type = filter_input(INPUT_POST, "type");

    if($type === "register"){
        echo "a";
        $name = filter_input(INPUT_POST, "name");
        $last_name = filter_input(INPUT_POST, "last_name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirm_password = filter_input(INPUT_POST, "confirm_password");

        if($name && $last_name && $email && $password){

        }
        else{
            echo "b";
            $message->set_message("Por favor, preencha todos os campos.", "alert-danger", "back");
        }
    }   
    else if($type === "login"){

    }

?>