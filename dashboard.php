<?php

    require_once("templates/header.php");
    require_once("dao/MovieDAO.php");

    $user = $user_dao->verify_token(true);
    $movie_dao = new MovieDAO($conn, $BASE_URL);
    $movies = $movie_dao->get_movies_by_user_id($user->getId());
?>
    <main>
        <div class="row m-auto p-3 mt-3 w-100">
            <div class="col-12">
                <h2 class="border border-5 border-end-0 border-top-0 border-bottom-0 border-warning ps-2"> Dashboard </h2>
                <p class="text-secondary">Adicione ou atualize as informações dos filmes que você enviou.</p>
            </div>
            <div class="mt-3 mb-3">
                <a  href="<?= $BASE_URL ?>add_movie.php"><button class="btn btn-warning"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar filme</button></a>
            </div>
            <div class="table-responsive col-12">
                <table class="table text-light" >
                    <thead class="table-dark">
                        <tr>
                        <th class="col-2" scope="col">#</th>
                        <th class="col-4" scope="col">Título</th>
                        <th class="col-1" scope="col">Nota</th>
                        <th class="col-4" scope="col">Opçôes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($movies):
                                foreach($movies as $movie):
                        ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="title-movie"> <a class="text-decoration-none text-light fw-bold" href="<?= $BASE_URL ?>movie.php?id="><?= $movie->getTitle() ?></a></td>
                                    <td><i class="fa fa-star text-warning" aria-hidden="true"></i> 9</td>
                                    <td>
                                        <a  href="<?= $BASE_URL ?>edit_movie.php?id=<?= $movie->getId() ?>" class="d-inline-block m-1 m-md-0"><button class="btn btn-primary"> <i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
                                        <form action="<?= $BASE_URL ?>process_movie.php" class="d-inline-block m-1 m-md-0">
                                            <input type="hidden" name="type" value="delete">
                                            <input type="hidden" name="id" value="<?= $movie->getId() ?>">
                                            <a  href="<?= $BASE_URL ?>add_movie.php" ><button class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Deletar</button></a>
                                        </form>
                                    </td>
                                <tr>
                        <?php
                                endforeach;
                            else:
                        ?>
                            <tr>
                                <td class="text-danger p-3 fw-bold text-center" colspan="4"> <h4> <i class="fa fa-warning" aria-hidden="true"></i> Você não adicionou nenhum filme até o momento.</h4></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php
    require_once("templates/footer.html");
?>