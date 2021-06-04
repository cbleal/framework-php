<div class="container py-5">
    <?= Sessao::alerta('post') ?>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            POSTAGENS
            <div class="float-end">
                <a href="<?=URL?>/posts/cadastrar" class="btn btn-primary">
                    Escrever
                </a>
            </div>
        </div>
        <div class="card-body">
            Listar posts aqui
        </div>
    </div>
</div>