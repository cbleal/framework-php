<?php 
include '../app/configuracao.php';
include '../app/Libraries/Rota.php';
include '../app/Libraries/Controller.php';
include '../app/Libraries/Database.php';

date_default_timezone_set('America/Sao_Paulo');

$db = new Database;

$db->query("SELECT * FROM posts ORDER BY id DESC");

foreach ($db->resultados() as $post) {
    echo $post->id.' - '.$post->titulo.'<br>';
}

echo '<hr>Total Resultados: '.$db->totalResultados();
// echo '<hr>Último Registro Inserido: '.$db->ultimoIdInserido();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MINHA FOLHA DE ESTILO CSS -->
    <link rel="stylesheet" href="<?=URL?>/css/estilo.css">
</head>
<body>

    <?php 
        include_once('../app/Views/topo.php');
        $rotas = new Rota();
        include_once('../app/Views/rodape.php');
    ?>
    
    <!-- JQUERY JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MEU APP JS -->
    <script src="<?=URL?>/js/jquery.funcoes.js"></script>
</body>
</html>