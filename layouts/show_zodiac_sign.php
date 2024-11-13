<?php
include('header.php');
$data_nascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);

if(!$data_nascimento) {
    echo("<p>Data é inválida</p> <a href= 'index.php'>Voltar</a>");
}

$signos = simplexml_load_file('signos.xml');

function verificar_signo($data, $inicio, $fim) {
    $ano = $data->format('Y');
    $data_inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$ano");
    $data_fim = DateTime::createFromFormat('d/m/Y', "$fim/$ano");

    if ($data_inicio > $data_fim) {
        $data_fim->modify('+1 year');
    }
    return ($data >= $data_inicio && $data <= $data_fim);
}

$signo_encontrado = null;

foreach ($signos as $signo) {
    if (verificar_signo($data_nascimento, $signo->dataInicio, $signo->dataFim)) {
        $signo_encontrado = $signo;
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signo</title>
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- Link para o CSS -->
</head>
<body>
    <div class="container-fluid main-container" data-signo="<?= $signo_encontrado->signoNome ?>">
        <div class="content-wrapper text-center p-4" id="signo-box" style="background-color: white; border-radius: 15px; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); max-width: 600px;">
            <?php if ($signo_encontrado): ?>
                <h1 class="text-primary mb-3">Seu signo é: <?= $signo_encontrado->signoNome ?></h1>
                <p class="text-muted"><?= $signo_encontrado->descricao ?></p>
                <button id="btn-learn-more" class="btn btn-info mt-4">Saiba mais</button>
                <!-- Modal de mais informações -->
                <div id="signoModal" class="modal">
                    <div class="modal-content p-4">
                        <span class="close">&times;</span>
                        <h2 class="text-primary"><?= $signo_encontrado->signoNome ?></h2>
                        <p><?= $signo_encontrado->descricao ?></p>
                        <p><strong>Características adicionais:</strong> Pessoas com o signo <?= $signo_encontrado->signoNome ?> tendem a ser muito dedicadas, focadas e buscam o sucesso em tudo que fazem.</p>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-danger">Data inválida! Não foi possível encontrar um signo correspondente.</p>
            <?php endif; ?>

            <a href='index.php' class="btn btn-secondary mt-4">Voltar</a>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

