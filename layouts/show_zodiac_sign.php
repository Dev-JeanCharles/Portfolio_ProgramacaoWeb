<?php 
    Não se esqueça de se inscrever no canal e deixar seu comentário 
?>

<body>
    <div class="container-fluid main-container mt-4 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="content-wrapper text-center p-5" style="background-color: white; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 500px;">
            <?php if ($signo_encontrado): ?>
                <h1 class="text-primary mb-4">Seu signo é: <?= $signo_encontrado->signoNome ?></h1>
                <p class="text-muted mb-5"><?= $signo_encontrado->descricao ?></p>
            <?php else: ?>
                <p class="text-danger mb-5">Data inválida! Não foi possível encontrar um signo correspondente.</p>
            <?php endif; ?>
            <a href='index.php' class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>