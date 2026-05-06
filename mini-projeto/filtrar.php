<?php
session_start();
require_once 'dados.php';
require_once 'funcoes.php';

$cats = categorias($cursos);

require 'cabecalho.php';
?>
<main class="page-main" style="max-width: 800px; min-height: 60vh;">
    <h1 class="section-title mb-4">Filtrar Cursos</h1>
    
    <form method="GET" action="index.php" class="course-card p-4" style="transform: none; box-shadow: none;">
        <div class="mb-4">
            <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Buscar por termo</label>
            <input type="text" name="busca" class="form-control" placeholder="Ex: PHP, Infraestrutura, Java..." style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);">
        </div>
        
        <p style="color: var(--cinza); font-size: 0.85rem; margin-bottom: 0.75rem;">Ou selecione uma categoria rápida:</p>
        <div class="d-flex flex-wrap gap-2 mb-4">
            <?php foreach ($cats as $cat): ?>
                <a href="index.php?busca=<?= urlencode($cat) ?>" class="course-tag" style="text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='var(--lima)'; this.style.color='var(--preto)'" onmouseout="this.style.background='rgba(200,241,53,.1)'; this.style.color='var(--lima)'">
                    <?= htmlspecialchars($cat) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn-ver-mais w-100" style="text-align: center; font-size: 0.9rem;"><i class="bi bi-search"></i> Filtrar Catálogo</button>
    </form>
</main>
<?php require 'rodape.php'; ?>