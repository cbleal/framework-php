<div class="row">
    <div class="col-md-8 mx-auto p-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-3">
                <li class="breadcrumb-item"><a href="<?=URL?>/posts">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <div class="card bg-light">
            <div class="card-header bg-secondary text-white">
                <h3>Editar Post</h3>
            </div>
            <div class="card-body">
                <form name="post_edit" method="POST" action="<?= URL.'/posts/editar/'.$dados['id'] ?>" class="mt-4">
                    <div class="mb-2">
                        <label for="titulo">Título: <sup class="text-danger">*</sup></label>
                        <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $dados['titulo_erro'] ?>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="texto">Texto: <sup class="text-danger">*</sup></label>
                        <textarea name="texto" id="texto" class="form-control <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" rows="5"><?= $dados['texto'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $dados['texto_erro'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-grid gap-2 my-2">
                            <input type="submit" value="Salvar" class="btn btn-info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>