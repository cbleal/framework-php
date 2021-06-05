<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 my-4">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts"><strong>Posts</strong></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->titulo ?></li>
        </ol>
    </nav>
    <div class="card text-center my-3">
        <div class="card-header bg-secondary text-white fw-bold">
            <strong><?= $dados['post']->titulo ?></strong>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $dados['post']->texto ?></p>
        </div>
        <div class="card-footer text-muted">
            Escrito por <strong><?= $dados['usuario']->nome ?></strong> em <?= date('d/m/Y H:i', strtotime($dados['post']->criado_em)) ?>
        </div>

        <?php if ($dados['post']->usuario_id === $_SESSION['usuario_id']) : ?>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="<?= URL . '/posts/editar/' . $dados['post']->id ?>" class="btn btn-primary btn-sm my-2">Editar</a>
                </li>
                <li class="list-inline-item">
                    <form action="<?= URL . '/posts/deletar/' . $dados['post']->id ?>" method="POST">
                        <input type="submit" class="btn btn-danger btn-sm" value="Excluir">
                    </form>
                </li>
            </ul>
        <?php endif; ?>

    </div>

</div>