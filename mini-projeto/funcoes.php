<?php
// ═══════════════════════════════════════════════════
//  funcoes.php — Funções auxiliares do CodePath
// ═══════════════════════════════════════════════════

/**
 * Retorna o HTML de um card de curso.
 */
function cardCurso(array $curso): string {
    $id       = (int) $curso['id'];
    $titulo   = htmlspecialchars($curso['titulo']);
    $cat      = htmlspecialchars($curso['categoria']);
    $nivel    = htmlspecialchars($curso['nivel']   ?? '');
    $duracao  = htmlspecialchars($curso['duracao'] ?? '');
    $nota     = isset($curso['nota']) ? number_format((float)$curso['nota'], 1) : '—';
    $imagem   = htmlspecialchars($curso['imagem']  ?? '');
    $descricao = htmlspecialchars(mb_substr($curso['descricao'] ?? '', 0, 110)) . '…';

    // Cor do nível
    $corNivel = match($nivel) {
        'Iniciante'    => '#4ade80',
        'Intermediário'=> '#facc15',
        'Avançado'     => '#f87171',
        default        => 'var(--cinza)',
    };

    return <<<HTML
    <article class="course-card">
        <img src="{$imagem}" alt="{$titulo}" loading="lazy"
             onerror="this.src='https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=600&q=80'">
        <div class="course-card-body">
            <span class="course-tag">{$cat}</span>
            <h3 class="course-title">{$titulo}</h3>
            <p class="course-desc">{$descricao}</p>
            <div style="display:flex; align-items:center; gap:.75rem; margin-top:.25rem; font-size:.75rem; font-family:var(--fonte-mono); color:var(--cinza);">
                <span style="color:{$corNivel};">● {$nivel}</span>
                <span>{$duracao}</span>
                <span style="margin-left:auto; color:var(--lima);">★ {$nota}</span>
            </div>
            <a href="detalhes.php?id={$id}" class="btn-ver-mais">Ver mais →</a>
        </div>
    </article>
    HTML;
}

/**
 * Busca um curso pelo ID no array (inclui extras da sessão).
 */
function buscarCursoPorId(array $cursos, int $id): ?array {
    foreach ($cursos as $c) {
        if ((int)$c['id'] === $id) return $c;
    }
    return null;
}

/**
 * Retorna todas as categorias únicas do catálogo.
 */
function categorias(array $cursos): array {
    $cats = array_unique(array_column($cursos, 'categoria'));
    sort($cats);
    return $cats;
}

/**
 * Gera um ID único para novos cursos adicionados via sessão.
 */
function gerarNovoId(array $cursos): int {
    if (empty($cursos)) return 1;
    return max(array_column($cursos, 'id')) + 1;
}
