<?php
    require_once("templates/header.php");

    $user = $user_dao->verify_token(true);
?>
     <main>
        <div class="row m-3">
            <form action="<?= $BASE_URL ?>process_user.php" method="POST" class="row" enctype="multipart/form-data">
                <div class="col-12 col-md-4 m-3">
                    <h1><?= $user->get_full_name() ?></h1>
                    <p class="text-secondary">Altere seu dados no formulário abaixo.</p>
                    <input type="hidden" name="type" value="update">
                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input  type="text" name="name" value="<?= $user->getName() ?>" class="form-control" id="password" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group mb-3">
                        <label for="last_name">Sobrenome</label>
                        <input  type="text" name="last_name" value="<?= $user->getLast_name() ?>"  class="form-control" id="last_name" placeholder="Digite seu sobrenome">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input readonly type="email" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>" aria-describedby="emailHelp" placeholder="Digite o seu email">
                    </div>
                    <button type="submit" class="btn btn-warning d-none d-md-block">Alterar</button>
                </div>
                <div class="col-12 col-md-4 m-3">
                    <div>
                        <div id="container-img" class="border border-5 border-warning rounded-circle col-8 m-auto " style="background-image: url('<?= $BASE_URL ?>img/users/<?= $user->getImage() ?>')">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Foto</label>
                        <input  type="file" name="image" class="form-control" id="image" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group mb-3">
                        <label for="bio">Sobre você</label>
                        <textarea name="bio" placeholder="Conte quem você é, o que faz, onde trabalha, seus gostos pessoais..." class="form-control" style="min-height: 100px; max-height: 100px; height: 100;"><?= $user->getBio() ?></textarea>
                    </div>
                   <div class="d-block d-md-none text-center">
                        <button type="submit" class="btn btn-warning">Alterar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row m-3">
            <form action="<?= $BASE_URL ?>process_user.php" method="POST" class="row">
                <div class="col-12 col-md-4 m-3">
                    <h1>Alterar a Senha:</h1>
                    <p class="text-secondary">Digite a nova senha e confirme para alterar.</p>
                    <input type="hidden" name="type" value="change_password">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <div class="form-group mb-3">
                        <label for="password">Senha</label>
                        <input required type="password" name="password" class="form-control" id="password" placeholder="Digite a nova senha">
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm_password">Confirme a senha</label>
                        <input required type="password" name="confirm_password" class="form-control" id="passwordw" placeholder="Confirme a senha">
                    </div>
                    <div class="text-center text-md-start">
                        <button type="submit" class="btn btn-warning">Alterar</button>
                    </div>
                </div>
            </form>
        </div>   
    </main>
    
<?php
    require_once("templates/footer.html");
?>