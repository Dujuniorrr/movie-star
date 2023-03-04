<?php

    require_once("globals.php");
    require_once("connection.php");
    require_once("model/User.php");
    require_once("model/Message.php");
    require_once("dao/UserDAO.php");
    require_once("model/Review.php");
    require_once("dao/ReviewDAO.php");

    $type = filter_input(INPUT_POST, "type");
    $message = new Message($BASE_URL);
    $user_dao = new UserDAO($conn, $BASE_URL);
    $user = $user_dao->verify_token(true);
    $review_dao = new ReviewDAO($conn, $BASE_URL);
    $review = new Review;

    if($type === "create"){
        $review_input = filter_input(INPUT_POST, "review");
        $rating = filter_input(INPUT_POST, "rating");
        $id_movie = filter_input(INPUT_POST, "id_movie");
        
        if($review_input && $rating){
            if(!$review_dao->has_already_reviewd($id_movie, $user->getId())){
                $review->setReview($review_input);
                $review->setRating($rating);
                $review->setUser($user);
                $review_dao->create_review($review, $id_movie);
            }
            else{
                $message->set_message("Você já enviou uma avaliação.", "alert-danger", "back");
            }
        }
        else{
            $message->set_message("Preencha todos os campos para enviar sua avaliação!", "alert-danger", "back");
        }
    }
    else{
        $message->set_message("Informações inválidas!", "alert-danger", "index.php");
    }

?>