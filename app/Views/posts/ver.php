<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->titulo ?></li>
        </ol>
    </nav>
    <div class="card my-3">
        <div class="card-header">
            <?= $dados['post']->titulo ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $dados['post']->texto ?></p>      
        </div>
        <div class="card-footer text-muted">        
            Escrito por <?= $dados['usuario']->nome ?> em <?= date('d/m/Y H:i', strtotime($dados['post']->criado_em)) ?>
        </div>
    </div>
</div>