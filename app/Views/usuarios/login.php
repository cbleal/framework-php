<div class="row">
    <div class="col-xl-4 col-md-6 mx-auto p-5">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <p class="card-text"><small class="text-muted">Informe os seus dados para fazer Login</small></p>

                <form name="login" method="POST" action="<?=URL?>/usuarios/login" class="mt-4">
                    <div class="mb-2">
                        <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['email_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['senha_erro'] ?>
                        </div>
                    </div>             

                    <div class="row">
                        <div class="d-grid gap-2">
                            <input type="submit" value="Entrar" class="btn btn-info">
                        </div>
                        <div class="col-md-6">
                            <small><a href="<?= URL ?>/usuarios/cadastrar">Não tem uma conta? Cadastre-se</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>