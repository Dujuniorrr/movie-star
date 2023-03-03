<?php
    if(empty($movie->getImage())){
        $movie->setImage("movie_cover.jpg");
    }
?>
<div class="movie-card p-0 bg-dark rounded-2">
    <div class="img-movie-container rounded-top" style="background-image: url('img/movies/<?= $movie->getImage() ?>');" >
    </div>
    <div class="mt-2 p-3">
        <div>
            <i class="fa fa-star text-warning" aria-hidden="true"></i>  9
        </div>
        <div class="mt-3">
            <a class="text-decoration-none text-light"  href="<?= $BASE_URL ?>movie.php?id=<?= $movie->getId() ?>"> <h5><?= $movie->getTitle() ?></h5></a>
        </div>
        <div class="p-2 mt-4">
            <a class="text-decoration-none text-light" href="<?= $BASE_URL ?>movie.php?id=<?= $movie->getId() ?>">
                <button class="btn btn-rate col-12 text-primary fw-bold">Avaliar</button>
            </a>
            <a class="text-decoration-none text-light" href="<?= $BASE_URL ?>movie.php?id=<?= $movie->getId() ?>">
                <button class="btn mt-3 btn-warning col-12">Conhecer</button>
            </a>
        </div>
    </div>
</div>