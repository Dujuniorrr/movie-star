 <?php
    require_once("templates/header.php");
?> 
    <main>
       <div class="row p-sm-4 p-2 pe-0 ps-4  w-100">
        <div class="container m-auto mb-0 mt-0 col-12 col-md-4 mb-5">
            <div class="border  mb-3 col-6 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                <h1 >Entrar</h1>
            </div>
            <form>
                <input type="hidden" name="type" value="login">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Senha</label>
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha">
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning col-12">Entrar</button>
                </div>
            </form>
        </div>
        <div class="container m-auto col-12 col-md-4 m-2">
            <div class="border col-10 mb-3 text-center border-top-0 border-start-0 border-end-0  border-bottom border-warning m-auto">
                <h1> Criar Conta </h1>
            </div>
            <form action="<?= $BASE_URL ?>process_auth.php" method="POST" >
                <input type="hidden" name="type" value="register">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite o seu email">
                </div>
                <div class="form-group mb-3">
                    <label for="name">Nome</label>
                    <input required type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Digite o seu nome">
                </div>
                <div class="form-group mb-3">
                    <label for="last_name">Sobrenome</label>
                    <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Digite seu sobrenome">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Senha</label>
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha">
                </div>
                <div class="form-group mb-3">
                    <label for="confirm_password">Confirme sua senha</label>
                    <input required type="confirm_password" name="confirm_password" class="form-control" id="passwordw" placeholder="Digite sua senha">
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning col-12">Cadastrar-se</button>
                </div>
            </form>
        </div>
       </div>
    </main>

<?php
    require_once("templates/footer.html");
?> 