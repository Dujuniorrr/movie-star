<?php
    require_once("templates/header.php");
    require_once("model/Movie.php");
    require_once("dao/MovieDAO.php");

    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $user = $user_dao->find_by_id($_GET['id']);
    if(!$user){
        $movie_dao->message->set_message("Esse usuário não foi encontrado!", "alert-danger", "index.php");
    }
    $movies = $movie_dao->get_movies_by_user_id($user->getId());
?>
    <main>
        <div class="container col-11 col-lg-8 rounded-2 p-2 mt-3 bg-dark">
            <div class="col-12 d-flex justify-content-center">
                <div class="border d-inline-block ps-2 pe-2 mb-3 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                    <h1> <?= $user->get_full_name() ?> </h1>
                </div>
            </div>
            <div class="border border-secondary border-3 border-start-0 border-end-0 border-top-0">
                <div id="container-img" class="border border-5 border-warning rounded-circle col-8 m-auto " style="background-image: url('<?= $BASE_URL ?>img/users/<?= $user->getImage() ?>')">
                </div>
                <div class="text-center mt-2 mb-2">
                    <h3>Sobre:</h3>
                    <?php if($user->getBio()): ?>
                        <p class="mt-3"><?= $user->getBio() ?></p>
                    <?php else: ?>
                        <p class="mt-3">Esse usuário ainda não escreveu nada sobre ele...</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 ps-3 pe-3">
                <h3>Filmes enviados:</h3>
                <div class="col-12 row row-movies-profile">
                    <?php if($movies): 
                        foreach($movies as $movie):
                            require("templates/card-movie.php");
                        endforeach;
                    else: ?>
                         <p class="mt-3 fw-bold text-center fs-5">Esse usuário ainda não enviou nenhum filme...</p>
                    <?php endif; ?>
                </div>
            </div>
           
        </div>
    </main>
<?php
    require_once("templates/footer.html");
?>