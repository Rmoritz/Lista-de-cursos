<?php
// Inicia sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodePath — Cursos de Tecnologia</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --preto:     #0a0a0f;
            --grafite:   #13131a;
            --painel:    #1a1a24;
            --borda:     #2a2a3a;
            --lima:      #c8f135;
            --lima-dim:  #a8d020;
            --branco:    #f0f0f5;
            --cinza:     #8888a0;
            --fonte-mono: 'Space Mono', monospace;
            --fonte-body: 'DM Sans', sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--preto);
            color: var(--branco);
            font-family: var(--fonte-body);
            font-weight: 400;
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar-codepath {
            background: var(--grafite);
            border-bottom: 1px solid var(--borda);
            padding: 0 2rem;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .navbar-brand-cp {
            font-family: var(--fonte-mono);
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--lima) !important;
            text-decoration: none;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .navbar-brand-cp .brand-dot {
            width: 8px; height: 8px;
            background: var(--lima);
            border-radius: 50%;
            display: inline-block;
            animation: pulse-dot 2s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .4; transform: scale(.7); }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: .25rem;
            list-style: none;
        }
        .nav-links a {
            font-family: var(--fonte-body);
            font-size: .85rem;
            font-weight: 500;
            color: var(--cinza);
            text-decoration: none;
            padding: .45rem .85rem;
            border-radius: 6px;
            transition: color .2s, background .2s;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--branco);
            background: var(--borda);
        }
        .nav-links a.active {
            color: var(--lima);
        }

        /* busca inline */
        .search-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex: 1;
            max-width: 320px;
        }
        .search-wrap input {
            background: var(--painel);
            border: 1px solid var(--borda);
            border-radius: 8px;
            color: var(--branco);
            font-family: var(--fonte-body);
            font-size: .85rem;
            padding: .45rem 1rem;
            width: 100%;
            outline: none;
            transition: border-color .2s;
        }
        .search-wrap input::placeholder { color: var(--cinza); }
        .search-wrap input:focus { border-color: var(--lima); }
        .search-wrap button {
            background: var(--lima);
            border: none;
            border-radius: 8px;
            color: var(--preto);
            font-family: var(--fonte-mono);
            font-size: .75rem;
            font-weight: 700;
            padding: .45rem .9rem;
            cursor: pointer;
            white-space: nowrap;
            transition: background .2s;
        }
        .search-wrap button:hover { background: var(--lima-dim); }

        /* badge login */
        .btn-login-cp {
            font-family: var(--fonte-mono);
            font-size: .75rem;
            font-weight: 700;
            color: var(--preto);
            background: var(--lima);
            border: none;
            border-radius: 8px;
            padding: .45rem 1.1rem;
            text-decoration: none;
            transition: background .2s;
            white-space: nowrap;
        }
        .btn-login-cp:hover { background: var(--lima-dim); color: var(--preto); }

        .btn-sair-cp {
            font-family: var(--fonte-mono);
            font-size: .75rem;
            font-weight: 700;
            color: var(--cinza);
            background: transparent;
            border: 1px solid var(--borda);
            border-radius: 8px;
            padding: .45rem 1.1rem;
            text-decoration: none;
            transition: all .2s;
            white-space: nowrap;
        }
        .btn-sair-cp:hover { border-color: var(--cinza); color: var(--branco); }

        /* ── HERO STRIP (aparece em index.php) ── */
        .hero-strip {
            background: linear-gradient(135deg, #0d1a00 0%, var(--preto) 60%);
            border-bottom: 1px solid var(--borda);
            padding: 4.5rem 2rem 3.5rem;
            position: relative;
            overflow: hidden;
        }
        .hero-strip::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 80% 50%, rgba(200,241,53,.08) 0%, transparent 60%),
                repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 39px,
                    rgba(200,241,53,.04) 40px
                );
            pointer-events: none;
        }
        .hero-eyebrow {
            font-family: var(--fonte-mono);
            font-size: .72rem;
            letter-spacing: 3px;
            color: var(--lima);
            text-transform: uppercase;
            margin-bottom: .75rem;
        }
        .hero-title {
            font-family: var(--fonte-mono);
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            line-height: 1.1;
            color: var(--branco);
            margin-bottom: 1rem;
        }
        .hero-title span { color: var(--lima); }
        .hero-sub {
            font-size: 1rem;
            color: var(--cinza);
            max-width: 520px;
            line-height: 1.6;
        }

        /* ── SHARED CARD STYLE (usado no index) ── */
        .course-card {
            background: var(--painel);
            border: 1px solid var(--borda);
            border-radius: 14px;
            overflow: hidden;
            transition: transform .25s, border-color .25s, box-shadow .25s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .course-card:hover {
            transform: translateY(-4px);
            border-color: var(--lima);
            box-shadow: 0 12px 32px rgba(200,241,53,.1);
        }
        .course-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }
        .course-card-body {
            padding: 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }
        .course-tag {
            font-family: var(--fonte-mono);
            font-size: .65rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--lima);
            background: rgba(200,241,53,.1);
            border: 1px solid rgba(200,241,53,.2);
            border-radius: 4px;
            padding: .2rem .55rem;
            display: inline-block;
            width: fit-content;
        }
        .course-title {
            font-family: var(--fonte-mono);
            font-size: .95rem;
            font-weight: 700;
            color: var(--branco);
            line-height: 1.3;
        }
        .course-desc {
            font-size: .82rem;
            color: var(--cinza);
            line-height: 1.5;
            flex: 1;
        }
        .btn-ver-mais {
            font-family: var(--fonte-mono);
            font-size: .75rem;
            font-weight: 700;
            color: var(--preto);
            background: var(--lima);
            border: none;
            border-radius: 8px;
            padding: .5rem 1rem;
            text-decoration: none;
            display: inline-block;
            width: fit-content;
            margin-top: .25rem;
            transition: background .2s;
        }
        .btn-ver-mais:hover { background: var(--lima-dim); color: var(--preto); }

        /* ── SECTION LABEL ── */
        .section-label {
            font-family: var(--fonte-mono);
            font-size: .72rem;
            letter-spacing: 3px;
            color: var(--lima);
            text-transform: uppercase;
            margin-bottom: .35rem;
        }
        .section-title {
            font-family: var(--fonte-mono);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--branco);
        }
        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, var(--lima) 0%, transparent 100%);
            width: 48px;
            margin: .75rem 0 2rem;
        }

        /* ── FILTRO ATIVO ── */
        .filter-active-badge {
            font-family: var(--fonte-mono);
            font-size: .75rem;
            color: var(--preto);
            background: var(--lima);
            border-radius: 6px;
            padding: .25rem .75rem;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 4rem 1rem;
            color: var(--cinza);
            font-family: var(--fonte-mono);
            font-size: .9rem;
        }

        /* ── PÁGINA INTERNA layout ── */
        .page-main { padding: 3rem 2rem; max-width: 1200px; margin: 0 auto; }

        /* ── RESPONSIVO ── */
        @media (max-width: 768px) {
            .search-wrap { display: none; }
            .hero-strip { padding: 3rem 1.25rem 2.5rem; }
            .page-main { padding: 2rem 1rem; }
        }
    </style>
</head>
<body>

<!-- ════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════ -->
<nav class="navbar-codepath">

    <!-- Brand -->
    <a href="index.php" class="navbar-brand-cp">
        <span class="brand-dot"></span>CodePath
    </a>

    <!-- Links -->
    <ul class="nav-links">
        <li><a href="index.php"     class="<?= $pagina_atual === 'index.php'     ? 'active' : '' ?>">Início</a></li>
        <li><a href="filtrar.php"   class="<?= $pagina_atual === 'filtrar.php'   ? 'active' : '' ?>">Cursos</a></li>
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
        <li><a href="protegido.php" class="<?= $pagina_atual === 'protegido.php' ? 'active' : '' ?>">Área Protegida</a></li>
        <?php endif; ?>
    </ul>

    <!-- Busca -->
    <form class="search-wrap" action="index.php" method="GET">
        <input type="text" name="busca"
               placeholder="Buscar por nome ou categoria…"
               value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>">
        <button type="submit"><i class="bi bi-search"></i> Buscar</button>
    </form>

    <!-- Auth -->
    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
        <a href="logout.php" class="btn-sair-cp">
            <i class="bi bi-box-arrow-right"></i> Sair
        </a>
    <?php else: ?>
        <a href="login.php" class="btn-login-cp">
            <i class="bi bi-lock-fill"></i> Login
        </a>
    <?php endif; ?>

</nav>
<!-- ════════ FIM NAVBAR ════════ -->
