<div class="container my-3">
        <?php Sessao::alerta('usuario') ?>
    <div class="card bg-light">
        <div class="row">
            <div class="col-md-4">
                <div class="card m-3">
                    <div class="card-header bg-secondary text-white">
                        <div class="card-title text-center"><?= $dados['nome'] ?></div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <?= $dados['biografia'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card m-3">
                    <div class="card-header bg-secondary text-white">
                        Dados Pessoais
                    </div>
                    <div class="card-body">
                        <form name="perfil" action="<?= URL ?>/usuarios/perfil/<?= $dados['id'] ?>" method="POST">
                            <div class="mb-3">
                                <label for="nome">Nome <sup class="text-danger">*</sup></label>
                                <input type="text" name="nome" id="nome" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['nome'] ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['nome_erro'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">E-mail <sup class="text-danger">*</sup></label>
                                <input type="text" name="email" id="email" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['email'] ?>">
                                <div class="invalid-feedback">
                                    <?= $dados['email_erro'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="senha">Senha <sup class="text-danger">*</sup></label>
                                <input type="password" name="senha" id="senha" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['senha'] ?>" placeholder="******">
                                <div class=" invalid-feedback">
                                <?= $dados['senha_erro'] ?>
                            </div>
                            <div class="mb-3">
                                <label for="biografia">Biografia <sup class="text-danger">*</sup></label>
                                <textarea name="biografia" id="biografia" rows="5" class="form-control <?= $dados['biografia_erro'] ? 'is-invalid' : '' ?>"><?= $dados['biografia'] ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $dados['biografia_erro'] ?>
                                </div>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-primary" value="Salvar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>