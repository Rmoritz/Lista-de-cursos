<?php
session_start();
require_once 'dados.php';
require_once 'funcoes.php';

$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
$curso = buscarCursoPorId($cursos, $id);

if (!$curso) {
    header('Location: index.php');
    exit;
}

require 'cabecalho.php';
?>
<main class="page-main" style="max-width: 800px;">
    <a href="index.php" class="btn btn-outline-secondary mb-4" style="border-color: var(--borda); color: var(--cinza);"><i class="bi bi-arrow-left"></i> Voltar</a>
    
    <article class="course-card" style="cursor: default; transform: none; box-shadow: none;">
        <img src="<?= htmlspecialchars($curso['imagem'] ?? '') ?>" alt="<?= htmlspecialchars($curso['titulo']) ?>" style="height: 350px; object-fit: cover;">
        <div class="course-card-body p-4">
            <span class="course-tag mb-3"><?= htmlspecialchars($curso['categoria']) ?></span>
            <h1 class="course-title fs-2 mb-3"><?= htmlspecialchars($curso['titulo']) ?></h1>
            
            <div class="d-flex flex-wrap gap-4 mb-4" style="font-family: var(--fonte-mono); font-size: 0.85rem; color: var(--cinza);">
                <span><i class="bi bi-bar-chart"></i> Nível: <?= htmlspecialchars($curso['nivel'] ?? '') ?></span>
                <span><i class="bi bi-clock"></i> <?= htmlspecialchars($curso['duracao'] ?? '') ?></span>
                <span style="color: var(--lima);"><i class="bi bi-star-fill"></i> <?= isset($curso['nota']) ? number_format((float)$curso['nota'], 1) : '—' ?></span>
            </div>
            
            <p class="course-desc fs-6" style="color: var(--branco); line-height: 1.8;">
                <?= htmlspecialchars($curso['descricao'] ?? '') ?>
            </p>
        </div>
    </article>
</main>
<?php require 'rodape.php'; ?>