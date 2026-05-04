<?php
// ═══════════════════════════════════════════════════
//  dados.php — Array central de cursos do CodePath
// ═══════════════════════════════════════════════════

$cursos = [

    // ─── TRILHA 1: Cursos de Programação ─────────────────────────────────
    [
        'id'        => 1,
        'titulo'    => 'Lógica de Programação e Algoritmos',
        'categoria' => 'Programação',
        'duracao'   => '40h',
        'nivel'     => 'Iniciante',
        'nota'      => 9.2,
        'imagem'    => 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=600&q=80',
        'descricao' => 'Focado em ensinar a base estrutural para a criação de códigos, utilizando fluxogramas e pseudocódigo. Ideal para quem está dando os primeiros passos no mundo da programação.',
    ],
    [
        'id'        => 2,
        'titulo'    => 'Desenvolvimento Web com PHP e HTML',
        'categoria' => 'Programação',
        'duracao'   => '60h',
        'nivel'     => 'Intermediário',
        'nota'      => 9.0,
        'imagem'    => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=600&q=80',
        'descricao' => 'Capacitação para criar sistemas dinâmicos que rodam no servidor e interagem com páginas web. Aprenda a combinar PHP com HTML para construir aplicações completas.',
    ],
    [
        'id'        => 3,
        'titulo'    => 'Programação Orientada a Objetos (POO) em Java',
        'categoria' => 'Programação',
        'duracao'   => '55h',
        'nivel'     => 'Intermediário',
        'nota'      => 8.8,
        'imagem'    => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&q=80',
        'descricao' => 'Estudo dos conceitos de classes, objetos, métodos e encapsulamento. Domine os pilares da POO e desenvolva aplicações robustas e reutilizáveis com Java.',
    ],
    [
        'id'        => 4,
        'titulo'    => 'Manipulação de Arrays e Estruturas de Dados',
        'categoria' => 'Programação',
        'duracao'   => '35h',
        'nivel'     => 'Intermediário',
        'nota'      => 8.6,
        'imagem'    => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=600&q=80',
        'descricao' => 'Uso de listas e laços de repetição para armazenamento e processamento de informações. Entenda como organizar dados de forma eficiente na memória.',
    ],

    // ─── TRILHA 2: Aprendendo Infraestrutura ─────────────────────────────
    [
        'id'        => 5,
        'titulo'    => 'Fundamentos de Redes e Protocolos',
        'categoria' => 'Infraestrutura',
        'duracao'   => '45h',
        'nivel'     => 'Iniciante',
        'nota'      => 9.1,
        'imagem'    => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80',
        'descricao' => 'Entendimento de como computadores se comunicam, TCP/IP, DNS e segurança básica. Essencial para quem quer trabalhar com redes e sistemas distribuídos.',
    ],
    [
        'id'        => 6,
        'titulo'    => 'Virtualização e Cloud Computing',
        'categoria' => 'Infraestrutura',
        'duracao'   => '50h',
        'nivel'     => 'Intermediário',
        'nota'      => 9.3,
        'imagem'    => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80',
        'descricao' => 'Introdução ao uso de máquinas virtuais e plataformas de nuvem como AWS, Azure e Google Cloud. Aprenda a escalar aplicações e gerenciar recursos em nuvem.',
    ],
    [
        'id'        => 7,
        'titulo'    => 'Gerenciamento de Ambientes de Servidor (Linux)',
        'categoria' => 'Infraestrutura',
        'duracao'   => '48h',
        'nivel'     => 'Intermediário',
        'nota'      => 8.9,
        'imagem'    => 'https://images.unsplash.com/photo-1629654297299-c8506221ca97?w=600&q=80',
        'descricao' => 'Comandos de terminal, permissões de usuário e manutenção de servidores Linux. Domine o ambiente mais usado por sysadmins e desenvolvedores profissionais.',
    ],
    [
        'id'        => 8,
        'titulo'    => 'Segurança da Informação e Controle de Acesso',
        'categoria' => 'Infraestrutura',
        'duracao'   => '42h',
        'nivel'     => 'Avançado',
        'nota'      => 9.5,
        'imagem'    => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=600&q=80',
        'descricao' => 'Práticas para proteger dados e configurar firewalls. Aprenda sobre criptografia, autenticação, gestão de acessos e conformidade com normas de segurança.',
    ],

    // ─── TRILHA 3: Seja um Profissional Web ──────────────────────────────
    [
        'id'        => 9,
        'titulo'    => 'Desenvolvimento Front-end com Bootstrap',
        'categoria' => 'Web',
        'duracao'   => '38h',
        'nivel'     => 'Iniciante',
        'nota'      => 8.7,
        'imagem'    => 'https://images.unsplash.com/photo-1621839673705-6617adf9e890?w=600&q=80',
        'descricao' => 'Utilização de frameworks para criar layouts responsivos e modernos. Construa interfaces profissionais que funcionam em qualquer dispositivo com Bootstrap 5.',
    ],
    [
        'id'        => 10,
        'titulo'    => 'Integração de Formulários e Superglobais (PHP)',
        'categoria' => 'Web',
        'duracao'   => '32h',
        'nivel'     => 'Intermediário',
        'nota'      => 8.5,
        'imagem'    => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&q=80',
        'descricao' => 'Como processar dados enviados pelo usuário de forma segura usando $_GET, $_POST e $_SESSION. Valide entradas e proteja saídas com boas práticas PHP.',
    ],
    [
        'id'        => 11,
        'titulo'    => 'Criação de APIs e Integração com Banco de Dados',
        'categoria' => 'Web',
        'duracao'   => '65h',
        'nivel'     => 'Avançado',
        'nota'      => 9.4,
        'imagem'    => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=600&q=80',
        'descricao' => 'Conexão entre o sistema web e bancos relacionais. Construa APIs RESTful, gerencie autenticação com tokens e integre front-end com back-end de ponta a ponta.',
    ],
    [
        'id'        => 12,
        'titulo'    => 'Metodologias Ágeis para Projetos Web',
        'categoria' => 'Web',
        'duracao'   => '28h',
        'nivel'     => 'Iniciante',
        'nota'      => 8.4,
        'imagem'    => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80',
        'descricao' => 'Práticas de organização e fluxo de trabalho aplicadas ao desenvolvimento de software. Aprenda Scrum, Kanban e como colaborar em equipes de desenvolvimento.',
    ],
];

// Mescla cursos da sessão (adicionados pelo admin) se existirem
if (isset($_SESSION['cursos_extras']) && is_array($_SESSION['cursos_extras'])) {
    $cursos = array_merge($cursos, $_SESSION['cursos_extras']);
}
