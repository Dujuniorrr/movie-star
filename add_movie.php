<?php
    require_once("templates/header.php");

    $user = $user_dao->verify_token(true);
?>
     <main>
        <div class="row m-3">
            <form action="<?= $BASE_URL ?>process_movie.php" method="POST" enctype="multipart/form-data">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 m-auto">
                    <div class="border col-10 mb-3 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                    <h1> Adicionar Filme </h1>
                    </div>
                    <p class="text-secondary text-center">Adicione sua critíca e compartilhe com o mundo!</p>
                    <input type="hidden" name="type" value="create">
                    <div class="form-group mb-3">
                        <label for="title">Título</label>
                        <input required type="text" name="title" class="form-control" id="title" placeholder="Digite o título do filme">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Imagem</label>
                        <input required type="file" name="image" class="form-control" id="image" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration">Duração (minutos) </label>
                        <input required type="number" name="duration" class="form-control" id="duration" placeholder="Digite a duração do filme em minutos.">
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Categoria</label>
                        <select name="category" class="form-control" required id="category">
                            <option value="">Selecione uma categoria.</option>
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
                        <input required type="text" name="trailer" class="form-control" id="trailer" placeholder="Insira o link do filme.">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Descrição</label>
                        <textarea name="description" placeholder="Informe a descrição do filme." class="form-control" style="min-height: 100px; max-height: 100px; height: 100;"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning col-12">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>   
    </main>
    
<?php
    require_once("templates/footer.html");
?>