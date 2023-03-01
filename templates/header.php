<?php
    require_once("globals.php");
    require_once("connection.php");
    require_once("process_auth.php");

    $flash_message = $message->get_message();
    if(!empty($flash_message)){
       $message->clear_message();
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Movie Star</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/6a5dd2730c.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
    <!-- ICON -->
    <link rel="shortcut icon" href="<?= $BASE_URL ?>img/moviestar.ico" type="image/x-icon">
   
</head>
<body class="bg-black text-light">
    <header>
        <nav class="navbar">
            <div class="container-fluid">
                <div >
                <a href="<?= $BASE_URL ?>" class="d-flex col-3 align-items-baseline text-decoration-none text-light">
                    <img src="<?= $BASE_URL ?>img/logo.svg" width="50px" alt="">
                    <h1 class="ms-2"><Strong>MovieStar</Strong></h1>
                </a>
                </div>
                <div class="d-flex d-lg-none m-3 m-sm-0">
                    <a href="<?= $BASE_URL ?>auth.php" class="text-decoration-none text-light">Entrar/Cadastrar </a>
                  </div>
              <form class="d-flex col-12 col-sm-12 col-lg-4 col-xl-5" role="search">
                <input class="form-control rounded-0 rounded-start" type="search" placeholder="Buscar filmes" aria-label="Search">
                <button class="btn btn-light rounded-0 rounded-end" type="submit"><i class="fa fa-search" aria-hidden="true"></i>  </button>
              </form>
              <div class="d-none d-sm-none d-lg-block">
                <a href="<?= $BASE_URL ?>auth.php" class="text-decoration-none text-light"> Entrar/Cadastrar </a>
              </div>
            </div>
          </nav>
    </header>
    <?php
      if(!empty($flash_message['msg'])):
    ?>
      <div class="alert <?= $flash_message['type']; ?> col-6 m-auto mb-3 mt-3 text-center" role="alert">
           <?= $flash_message['msg']; ?>
      </div>
    <?php
       endif;
    ?>
