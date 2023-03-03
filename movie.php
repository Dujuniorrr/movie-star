<?php
    require_once("templates/header.php");
    require_once("model/Movie.php");
    require_once("dao/MovieDAO.php");
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $movie = $movie_dao->find_by_id($_GET['id']);
    if(!$movie){
        $movie_dao->message->set_message("O filme não foi encontrado!", "alert-danger", "index.php");
    }
    if(!$movie->getImage()){
        $movie->setImage("movie_cover.jpg");
    }
?>

    <main>
        <div class="container mt-4 mb-3">
            <div class="row">
                <div class="col-12 col-md-8 mb-3">
                    <div class="border col-10 mb-3 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                        <h1> <?= $movie->getTitle() ?> </h1>
                    </div>
                    <div class="col-12 text-center m-3">
                        <span class="me-3">Duração: <?= $movie->getDuration() ?> minutos</span>
                        <span class="me-3"><?= $movie->getCategory() ?></span>
                        <span class="me-3"> <i class="fa fa-star text-warning" aria-hidden="true"></i> 9 </span>
                    </div>
                    <div class="col-1o m-auto" style="min-height: 350px; height: 350px;">
                        <iframe class="w-100 h-100" src="<?= $movie->getTrailer() ?>"></iframe>
                    </div>
                    <div class="mt-4 mb-4 p-2 text-justify">
                        <p ><?= $movie->getDescription() ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                        <div class="img-movie-container rounded-top" style="background-image: url('img/movies/<?= $movie->getImage() ?>');" >
                        </div>
                        <div class="col-12 mt-3 text-center">
                            <div class="align-item-center">Filme adicionado por: </div>
                            <div class="mt-2 border border-5 border-warning rounded-circle col-8 m-auto container-img-user-movie" style="background-image: url('<?= $BASE_URL ?>img/users/<?= $movie->getUser()->getImage() ?>')">
                            </div>
                            <div class="fw-bold mb-2"><a class="text-decoration-none text-light" href="<?=$BASE_URL ?>view_profile.php?id=<?= $movie->getUser()->getId() ?>"><?= $movie->getUser()->getName() ?></a></div>
                        </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div >
                <h2> Avaliações: </h2>
            </div>
            <div class="p-3 bg-dark rounded-2">
                <h3> Envie sua avaliação </h3>
                <p> Preencha o formulário com a nota e o coméntario sobre o filme.</p>
                <form>
                    <div class="form-group mb-3 col-12 col-md-6">
                        <label for="rating">Nota</label>
                        <input type="hidden" name="type" value="rate">
                        <input type="hidden" name="id_movie" value="<?= $movie->getId() ?>">
                        <select name="rating" class="form-control" required id="rating">
                            <option value="">Adicione uma nota.</option>
                            <option value="1" select>1</option>
                            <option value="2" select>2</option>
                            <option value="3" select>3</option>
                            <option value="4" select>4</option>
                            <option value="5" select>5</option>
                            <option value="6" select>6</option>
                            <option value="7" select>7</option>
                            <option value="8" select>8</option>
                            <option value="9" select>9</option>
                            <option value="10" select>10</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-12 col-md-6">
                        <label for="last_name">Sobrenome</label>
                        <textarea name="review" id="review" placeholder="Diga o que achou do filme" class="form-control" style="height: 100px; min-height: 100px; max-height: 100px;"></textarea>
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-warning">Avaliar</button>
                </form>
                </div>
            </div>
        </div>
        <div class="container mt-3">

            <div class="mb-2 p-3 border border-1 border-top-0 border-start-0 border-end-0 border-secondary">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <div class="border border-5 border-warning rounded-circle col-8 m-auto container-img-review" style="background-image: url('')">
                        </div>
                    </div>
                    <div class="col-8 col-md-10">
                        <div class="col-12 h-25">
                            <h4 class="text-warning">Nome do Usuário</h4>
                            <i class="fa fa-star text-warning" aria-hidden="true"></i> 9
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 ps-4">
                    <p class="text-secondary">Comentário:</p>
                    <p class="mb-2">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem tenetur nostrum modi pariatur recusandae, animi doloribus reiciendis sit dolores iste! Cum aspernatur quam eaque nesciunt excepturi dignissimos, distinctio numquam magni?
                    </p>
                 </div>
            </div>
            
        </div>
    </main>

<?php
    require_once("templates/footer.html");
?>