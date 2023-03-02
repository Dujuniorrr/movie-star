<?php
    require_once("globals.php");
    require_once("connection.php");
    require_once("process_auth.php");
    require_once("dao/UserDAO.php");

    $flash_message = $message->get_message();
    if(!empty($flash_message)){
       $message->clear_message();
    }

    $user = $user_dao->verify_token();
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
                <div class="d-flex d-sm-inline row d-lg-none m-3 m-sm-2 m-md-0">
                  <?php if($user): ?>
                    <a href="<?= $BASE_URL ?>add_movie.php" class="text-decoration-none text-light m-2"> <i class="fa fa-plus-square" aria-hidden="true"></i> Incluir Filme </a>
                    <a href="<?= $BASE_URL ?>dashboard.php" class="text-decoration-none text-light m-2"> Meus Filmes </a>
                    <a href="<?= $BASE_URL ?>edit_profile.php" class="text-decoration-none text-light m-2"> <strong><?= $user->getName() ?></strong> </a>
                    <a href="<?= $BASE_URL ?>logout.php" class="text-decoration-none text-light m-2"> Sair </a>
                  <?php else: ?>
                    <a href="<?= $BASE_URL ?>auth.php" class="text-decoration-none text-light m-2">Entrar/Cadastrar </a>
                  <?php endif; ?>
                </div>
              <form class="d-flex col-12 col-sm-12 col-lg-4 col-xl-5" role="search">
                <input class="form-control rounded-0 rounded-start" type="search" placeholder="Buscar filmes" aria-label="Search">
                <button class="btn btn-light rounded-0 rounded-end" type="submit"><i class="fa fa-search" aria-hidden="true"></i>  </button>
              </form>
              <div class="d-none d-sm-none d-lg-block">
                  <?php if($user): ?>
                    <a href="<?= $BASE_URL ?>add_movie.php" class="text-decoration-none text-light m-2"> <i class="fa fa-plus-square" aria-hidden="true"></i> Incluir Filme </a>
                    <a href="<?= $BASE_URL ?>dashboard.php" class="text-decoration-none text-light m-2"> Meus Filmes </a>
                    <a href="<?= $BASE_URL ?>edit_profile.php" class="text-decoration-none text-light m-2"> <strong><?= $user->getName() ?></strong></a>
                    <a href="<?= $BASE_URL ?>logout.php" class="text-decoration-none text-light m-2"> Sair </a> 
                  <?php else: ?>
                    <a href="<?= $BASE_URL ?>auth.php" class="text-decoration-none text-light m-2">Entrar/Cadastrar </a>
                  <?php endif; ?>
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
