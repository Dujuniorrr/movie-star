<?php
    require_once("templates/header.php");
    require_once("model/Movie.php");
    require_once("dao/MovieDAO.php");
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $latest_movies = $movie_dao->get_latest_movies();
    $action_movies = $movie_dao->get_movie_by_categories("Ação");
    $drama_movies = $movie_dao->get_movie_by_categories("Drama");
    $docs_movies = $movie_dao->get_movie_by_categories("Documentário");
?>
    <main>
      <div class="row m-3 mt-4">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2">Filmes Novos</h2>
                <p class="text-secondary">Veja as críticas dos ultimos filmes adicionados no MovieStar.</p>
            </div>
            <div class="col-12 row row-movies">
                <?php if(!$latest_movies): ?>
                    <div class="inline-block m-auto"><h3> Ainda não há filmes adicionados!</h3></div>
                <?php else: ?>
                    <?php foreach($latest_movies as $movie): ?>
                        <?php require("templates/card-movie.php") ?>
                <?php endforeach; 
                endif; ?>
            </div>
      </div>

      <div class="row m-3 mt-4">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2"> Ação</h2>
                <p class="text-secondary">Veja os melhores filmes de ação.</p>
            </div>
            <div class="col-12 row row-movies">
                <?php if(!$action_movies): ?>
                    <div class="inline-block m-auto"><h3> Ainda não há filmes de ação adicionados!</h3></div>
                <?php else: ?>
                    <?php foreach($action_movies as $movie): ?>
                        <?php require("templates/card-movie.php") ?>
                <?php endforeach; 
                endif;?>
            </div>
      </div>

      <div class="row m-3 mt-4">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2">Drama</h2>
                <p class="text-secondary">Veja os melhores filmes de drama.</p>
            </div>
            <div class="col-12 row row-movies">
                <?php if(!$drama_movies): ?>
                    <div class="inline-block m-auto"><h3> Ainda não há filmes de drama adicionados!</h3></div>
                <?php else: ?>
                    <?php foreach($drama_movies as $movie): ?>
                        <?php require("templates/card-movie.php") ?>
                <?php endforeach; 
                    endif;?>
            </div>
      </div>

      <div class="row m-3 mt-4">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2">Documentários</h2>
                <p class="text-secondary">Veja os melhores documentários.</p>
            </div>
            <div class="col-12 row row-movies">
                <?php if(!$docs_movies): ?>
                    <div class="inline-block m-auto"><h3> Ainda não há documentários adicionados!</h3></div>
                <?php else: ?>
                    <?php foreach($docs_movies as $movie): ?>
                        <?php require("templates/card-movie.php") ?>
                <?php endforeach; 
                    endif;?>
            </div>
      </div>
    </main>
    
<?php
    require_once("templates/footer.html");
?>