<?php

    require_once("globals.php");
    require_once("connection.php");
    require_once("model/User.php");
    require_once("model/Message.php");
    require_once("dao/UserDAO.php");
    require_once("dao/MovieDAO.php");

    $message = new Message($BASE_URL);
    $movie = new Movie;
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $user_dao = new UserDao($conn, $BASE_URL);
    $user = $user_dao->verify_token();
    $type = filter_input(INPUT_POST, "type");

    if($type === "create"){
        $title = filter_input(INPUT_POST, "title");
        $category = filter_input(INPUT_POST, "category");
        $description = filter_input(INPUT_POST, "description");
        $duration = filter_input(INPUT_POST, "duration");
        $trailer = filter_input(INPUT_POST, "trailer");

        if($title && $category && $description){
            $movie->setTitle($title);
            $movie->setCategory($category);
            $movie->setDescription($description);
            $movie->setDuration($duration);
            $movie->setTrailer($trailer);
            $movie->setUser($user);

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

                    $image_name = $movie->image_generate_name();
                    imagejpeg($image_file, "./img/movies/" . $image_name, 100);
                    $movie->setImage($image_name);
                }
                else{
                    $message->set_message("Tipo inválido de imagem, insira uma imagem png, jpg ou jpeg.", "alert-danger", "back");
                    exit;
                }
            }

            $movie_dao->create_movie($movie);
        }
        else{
            $message->set_message("Você precisa adicionar pelo menos título, descrição e categoria.", "alert-danger", "back");
        }
        
    }
    else{
        $message->set_message("Informações inválidas!", "alert-danger", "index.php");
    }