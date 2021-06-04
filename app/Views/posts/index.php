<div class="container py-5">
    <?= Sessao::alerta('post') ?>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            POSTAGENS
            <div class="float-end">
                <a href="<?= URL ?>/posts/cadastrar" class="btn btn-primary">
                    Escrever
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($dados['posts'] as $post) : ?>
                <div class="card my-3">
                    <div class="card-header">
                        <?= $post->titulo ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $post->texto ?></p>
                        <a href="#" class="btn btn-primary float-end">Ler mais</a>
                    </div>
                    <div class="card-footer text-muted">
                        Escrito por: <?= $post->nome ?> em <?= date('d/m/Y H:i', strtotime($post->criado_em)) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>