<?php
    require_once('templates/header.php');

    if($user){
        $user_dao->destroy_token();
    }
?>