<?php
session_start();
require_once 'dados.php';
require_once 'funcoes.php';


$busca = '';
if (isset($_GET['busca']) && !empty(trim($_GET['busca']))) {
    $busca = trim(htmlspecialchars($_GET['busca']));
}


function filtrarCursos(array $cursos, string $termo): array {
    if ($termo === '') return $cursos;
    $t = mb_strtolower($termo);
    return array_filter($cursos, function($c) use ($t) {
        return str_contains(mb_strtolower($c['titulo']), $t)
            || str_contains(mb_strtolower($c['categoria']), $t);
    });
}

$cursosFiltrados = filtrarCursos($cursos, $busca);


$trilhas = [
    'Programação'    => ['label' => 'Cursos de Programação',      'num' => '01'],
    'Infraestrutura' => ['label' => 'Aprendendo Infraestrutura',  'num' => '02'],
    'Web'            => ['label' => 'Seja um Profissional Web',   'num' => '03'],
];

$porCategoria = [];
foreach ($cursosFiltrados as $c) {
    $porCategoria[$c['categoria']][] = $c;
}

require 'cabecalho.php';
?>

<!-- ── HERO ── -->
<?php if ($busca === ''): ?>
<section class="hero-strip">
    <div style="max-width:1200px; margin:0 auto; position:relative; z-index:1;">
        <p class="hero-eyebrow">// catálogo online · 2026</p>
        <h1 class="hero-title">
            Aprenda.<br>
            Construa.<br>
            <span>Evolua.</span>
        </h1>
        <p class="hero-sub">
            <?= count($cursos) ?> cursos organizados em trilhas de aprendizado.
            Do zero ao profissional, no seu ritmo.
        </p>
    </div>
</section>
<?php endif; ?>

<!-- ── MAIN ── -->
<main class="page-main">

    <?php if ($busca !== ''): ?>
    
    <div style="margin-bottom:2rem; display:flex; align-items:center; gap:.75rem; flex-wrap:wrap;">
        <span class="filter-active-badge">
            <i class="bi bi-search"></i> "<?= $busca ?>"
        </span>
        <span style="font-size:.82rem; color:var(--cinza);">
            <?= count($cursosFiltrados) ?> curso(s) encontrado(s)
        </span>
        <a href="index.php" style="font-size:.8rem; font-family:var(--fonte-mono); color:var(--cinza); text-decoration:none; border:1px solid var(--borda); border-radius:6px; padding:.2rem .6rem; transition:all .2s;" onmouseover="this.style.color='var(--branco)'; this.style.borderColor='var(--cinza)'" onmouseout="this.style.color='var(--cinza)'; this.style.borderColor='var(--borda)'">
            <i class="bi bi-x"></i> Limpar
        </a>
    </div>
    <?php endif; ?>

    <?php if (empty($cursosFiltrados)): ?>
        <div class="empty-state">
            <i class="bi bi-search" style="font-size:2.5rem; color:var(--borda); display:block; margin-bottom:1rem;"></i>
            Nenhum curso encontrado para <strong style="color:var(--branco);">"<?= $busca ?>"</strong>.
        </div>

    <?php elseif ($busca !== ''): ?>
        
        <div class="row g-4">
            <?php foreach ($cursosFiltrados as $curso): ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <?= cardCurso($curso) ?>
            </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        
        <?php foreach ($trilhas as $cat => $info): ?>
            <?php if (empty($porCategoria[$cat])) continue; ?>

            <section style="margin-bottom: 4rem;">

                
                <div style="display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:.75rem; margin-bottom:1.5rem;">
                    <div>
                        <p class="section-label">trilha <?= htmlspecialchars($info['num']) ?></p>
                        <h2 class="section-title"><?= htmlspecialchars($info['label']) ?></h2>
                        <div class="section-divider"></div>
                    </div>
                    <a href="filtrar.php?categoria=<?= urlencode($cat) ?>"
                       style="font-family:var(--fonte-mono); font-size:.75rem; color:var(--cinza); text-decoration:none; border:1px solid var(--borda); border-radius:8px; padding:.4rem .9rem; transition:all .2s;"
                       onmouseover="this.style.color='var(--lima)'; this.style.borderColor='var(--lima)'"
                       onmouseout="this.style.color='var(--cinza)'; this.style.borderColor='var(--borda)'">
                        Ver todos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- Cards -->
                <div class="row g-4">
                    <?php foreach ($porCategoria[$cat] as $curso): ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <?= cardCurso($curso) ?>
                    </div>
                    <?php endforeach; ?>
                </div>

            </section>
        <?php endforeach; ?>

        
        <?php
        $extras = array_filter($cursosFiltrados, fn($c) => !array_key_exists($c['categoria'], $trilhas));
        if (!empty($extras)):
        ?>
        <section style="margin-bottom:4rem;">
            <div>
                <p class="section-label">adicionados recentemente</p>
                <h2 class="section-title">Novos Cursos</h2>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4">
                <?php foreach ($extras as $curso): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <?= cardCurso($curso) ?>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

    <?php endif; ?>

</main>

<?php require 'rodape.php'; ?>
