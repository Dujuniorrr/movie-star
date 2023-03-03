<?php
    require_once("templates/header.php");
    require_once("model/Movie.php");
    require_once("dao/MovieDAO.php");

    $user = $user_dao->verify_token(true);
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $movie = $movie_dao->find_by_id($_GET['id']);
    if($user->getId() != $movie->getUser()->getId()){
        $movie_dao->message->set_message("Você não tem permissão para editar esse filme!", "alert-danger", "index.php");
    }
?>
     <main>
        <div class="row m-3">
            <form class="col-12 col-sm-7" action="<?= $BASE_URL ?>process_movie.php" method="POST" enctype="multipart/form-data">
                <div class="col-12 col-sm-12 col-md-8 col-lg-6 m-auto">
                    <div class="border col-10 mb-3 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                        <h1> Editar Filme </h1>
                    </div>
                    <p class="text-secondary text-center">Adicione sua critíca e compartilhe com o mundo!</p>
                    <div class="d-flex d-sm-none col-10 m-auto mt-4 mb-4">
                        <div class="img-movie-container rounded-2" style="background-image: url('img/movies/<?= $movie->getImage() ?>'); height: 600px;" >
                        </div>
                    </div>
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $movie->getId() ?>">
                    <div class="form-group mb-3">
                        <label for="title">Título</label>
                        <input  type="text" value="<?= $movie->getTitle() ?>" name="title" class="form-control" id="title" placeholder="Digite o título do filme">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Imagem</label>
                        <input type="file" name="image" class="form-control" id="image" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration">Duração (minutos) </label>
                        <input  type="number"  value="<?= $movie->getDuration() ?>" name="duration" class="form-control" id="duration" placeholder="Digite a duração do filme em minutos.">
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Categoria</label>
                        <select name="category" class="form-control"  id="category">
                            <option value="<?= $movie->getCategory() ?>"> <?= $movie->getCategory() ?></option>
                            <option value="Ação" select>Ação</option>
                            <option value="Comédia" select>Comédia</option>
                            <option value="Crime" select>Crime</option>
                            <option value="Drama" select>Drama</option>
                            <option value="Fantasia" select>Fantasia</option>
                            <option value="Ficção Cientifíca" select>Ficção Cientifíca</option>
                            <option value="Romance" select>Romance</option>
                            <option value="Suspense" select>Suspense</option>
                            <option value="Terror" select>Terror</option>
                            <option value="Documentário" select>Documentário</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="trailer">Trailer</label>
                        <input  type="text" value="<?= $movie->getTrailer() ?>"  name="trailer" class="form-control" id="trailer" placeholder="Insira o link do filme.">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Descrição</label>
                        <textarea name="description" placeholder="Informe a descrição do filme." class="form-control" style="min-height: 100px; max-height: 100px; height: 100;"><?= $movie->getDescription() ?> </textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning col-12">Adicionar</button>
                    </div>
                </div>
            </form>
            <div class="d-none d-sm-flex col-sm-5 col-md-4 col-lg-3">
                <div class="img-movie-container rounded-2" style="background-image: url('img/movies/<?= $movie->getImage() ?>');" >
                </div>
            </div>
        </div>   
    </main>
    
<?php
    require_once("templates/footer.html");
?>