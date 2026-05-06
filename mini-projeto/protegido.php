<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'dados.php';
require_once 'funcoes.php';

$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoCurso = [
        'id'        => gerarNovoId($cursos),
        'titulo'    => trim(htmlspecialchars($_POST['titulo'] ?? '')),
        'categoria' => trim(htmlspecialchars($_POST['categoria'] ?? '')),
        'duracao'   => trim(htmlspecialchars($_POST['duracao'] ?? '')),
        'nivel'     => trim(htmlspecialchars($_POST['nivel'] ?? '')),
        'nota'      => filter_var($_POST['nota'] ?? 0, FILTER_VALIDATE_FLOAT),
        'imagem'    => trim(htmlspecialchars($_POST['imagem'] ?? '')),
        'descricao' => trim(htmlspecialchars($_POST['descricao'] ?? ''))
    ];

    if (!empty($novoCurso['titulo']) && !empty($novoCurso['categoria'])) {
        $_SESSION['cursos_extras'][] = $novoCurso;
        $sucesso = 'Curso adicionado com sucesso!';
    }
}

require 'cabecalho.php';
?>
<main class="page-main" style="max-width: 650px;">
    <h1 class="section-title mb-4">Adicionar Novo Curso</h1>

    <?php if ($sucesso): ?>
        <div class="alert alert-success p-2 text-center mb-4" style="background: var(--lima); border: none; color: var(--preto); font-weight: bold; font-family: var(--fonte-mono);">
            <?= $sucesso ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="protegido.php" class="course-card p-4" style="transform: none; box-shadow: none;">
        <div class="mb-3">
            <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Título do Curso</label>
            <input type="text" name="titulo" class="form-control" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);" required>
        </div>
        
        <div class="row mb-3 g-3">
            <div class="col-md-6">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Categoria</label>
                <input type="text" name="categoria" class="form-control" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);" required>
            </div>
            <div class="col-md-6">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Nível</label>
                <select name="nivel" class="form-select" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);">
                    <option value="Iniciante">Iniciante</option>
                    <option value="Intermediário">Intermediário</option>
                    <option value="Avançado">Avançado</option>
                </select>
            </div>
        </div>
        
        <div class="row mb-3 g-3">
            <div class="col-md-6">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Duração (ex: 40h)</label>
                <input type="text" name="duracao" class="form-control" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);">
            </div>
            <div class="col-md-6">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Nota (0 a 10)</label>
                <input type="number" step="0.1" max="10" name="nota" class="form-control" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);">
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">URL da Imagem</label>
            <input type="url" name="imagem" class="form-control" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);">
        </div>
        
        <div class="mb-4">
            <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3" style="background: var(--preto); border: 1px solid var(--borda); color: var(--branco);"></textarea>
        </div>
        
        <button type="submit" class="btn-ver-mais w-100" style="text-align: center; font-size: 0.9rem;">Cadastrar Curso</button>
    </form>
</main>
<?php require 'rodape.php'; ?>