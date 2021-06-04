<div class="row">
    <div class="col-md-8 mx-auto p-5">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3>Cadastrar Post</h3>
            </div>
            <div class="card-body">      
                <form name="login" method="POST" action="<?=URL?>/posts/cadastrar" class="mt-4">
                    <div class="mb-2">
                        <label for="titulo">Título: <sup class="text-danger">*</sup></label>
                        <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['titulo_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="texto">Texto: <sup class="text-danger">*</sup></label>
                        <textarea name="texto" id="texto" class="form-control <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>"><?= $dados['texto'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $dados['texto_erro'] ?>
                        </div>
                    </div>             

                    <div class="row">
                        <div class="d-grid gap-2">
                            <input type="submit" value="Cadastrar" class="btn btn-info">
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>