<?php
    require_once("templates/header.php");
    require_once("model/Movie.php");
    require_once("dao/MovieDAO.php");
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $movies = $movie_dao->find_by_title($_GET['search']);
    if(!$movies || $_GET['search'] == ""){
        $message->set_message("Nenhum filme encontrado!","alert-danger", "index.php");
    }
?>
    <main>
      <div class="row m-3 mt-4">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2">Você está buscando por: <span class="text-warning"><?= $_GET['search'] ?></span></h2>
                <p class="text-secondary">Resultados com base na sua busca.</p>
            </div>
            <div class="col-12 row row-movies">
                <?php if(!$movies): ?>
                    <div class="inline-block m-auto"><h3> Nenhum resultado encontrado!</h3></div>
                <?php else: ?>
                    <?php foreach($movies as $movie): ?>
                        <?php require("templates/card-movie.php") ?>
                <?php endforeach; 
                endif; ?>
            </div>
      </div>

    
<?php
    require_once("templates/footer.html");
?>