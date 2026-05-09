<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: protegido.php');
    exit;
}

$erro = '';
$hash_salvo = password_hash('1234', PASSWORD_DEFAULT);
$user_salvo = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['usuario'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($user === $user_salvo && password_verify($senha, $hash_salvo)) {
        $_SESSION['logado'] = true;
        header('Location: protegido.php');
        exit;
    } else {
        $erro = 'Credenciais inválidas. Tente novamente.';
    }
}

require 'cabecalho.php';
?>
<main class="page-main d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="course-card p-4" style="width: 100%; max-width: 400px; transform: none; box-shadow: none;">
        <h2 class="course-title mb-4 text-center fs-3">Acesso Restrito</h2>
        
        <?php if ($erro): ?>
            <div class="alert alert-danger p-2 text-center" style="font-size: 0.85rem; background: #3a1515; border: 1px solid #f87171; color: #f87171;">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Usuário</label>
                <input type="text" name="usuario" class="form-control" style="background: var(--painel); border: 1px solid var(--borda); color: var(--branco);" required>
            </div>
            <div class="mb-4">
                <label class="form-label" style="color: var(--cinza); font-size: 0.85rem;">Senha</label>
                <input type="password" name="senha" class="form-control" style="background: var(--painel); border: 1px solid var(--borda); color: var(--branco);" required>
            </div>
            <button type="submit" class="btn-ver-mais w-100" style="text-align: center;">Entrar</button>
        </form>
    </div>
</main>
<?php require 'rodape.php'; ?>