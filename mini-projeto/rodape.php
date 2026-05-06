<!-- ════════════════════════════════════════════
     RODAPÉ
════════════════════════════════════════════ -->
<footer style="
    background: var(--grafite);
    border-top: 1px solid var(--borda);
    padding: 3rem 2rem 2rem;
    margin-top: auto;
">
    <div style="max-width:1200px; margin:0 auto;">

        <div style="display:grid; grid-template-columns: 1.5fr 1fr 1fr; gap:2.5rem; margin-bottom:2.5rem;">

            <!-- Col 1 – Brand -->
            <div>
                <p style="font-family:var(--fonte-mono); font-size:1rem; font-weight:700; color:var(--lima); margin-bottom:.6rem;">
                    <span style="display:inline-block; width:8px; height:8px; background:var(--lima); border-radius:50%; margin-right:6px;"></span>CodePath
                </p>
                <p style="font-size:.82rem; color:var(--cinza); line-height:1.6; max-width:260px;">
                    Catálogo de cursos de tecnologia desenvolvido como projeto acadêmico em PHP. Sem banco de dados, sem framework.
                </p>
            </div>

            <!-- Col 2 – Navegação -->
            <div>
                <p style="font-family:var(--fonte-mono); font-size:.7rem; letter-spacing:2px; text-transform:uppercase; color:var(--cinza); margin-bottom:.85rem;">Navegação</p>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:.45rem;">
                    <li><a href="index.php"     style="font-size:.82rem; color:var(--cinza); text-decoration:none; transition:color .2s;" onmouseover="this.style.color='var(--branco)'" onmouseout="this.style.color='var(--cinza)'">Início</a></li>
                    <li><a href="filtrar.php"   style="font-size:.82rem; color:var(--cinza); text-decoration:none;" onmouseover="this.style.color='var(--branco)'" onmouseout="this.style.color='var(--cinza)'">Filtrar Cursos</a></li>
                    <li><a href="login.php"     style="font-size:.82rem; color:var(--cinza); text-decoration:none;" onmouseover="this.style.color='var(--branco)'" onmouseout="this.style.color='var(--cinza)'">Login</a></li>
                    <li><a href="protegido.php" style="font-size:.82rem; color:var(--cinza); text-decoration:none;" onmouseover="this.style.color='var(--branco)'" onmouseout="this.style.color='var(--cinza)'">Área Protegida</a></li>
                </ul>
            </div>

            <!-- Col 3 – Projeto -->
            <div>
                <p style="font-family:var(--fonte-mono); font-size:.7rem; letter-spacing:2px; text-transform:uppercase; color:var(--cinza); margin-bottom:.85rem;">Projeto</p>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:.45rem;">
                    <li style="font-size:.82rem; color:var(--cinza);">Mini Projeto A2</li>
                    <li style="font-size:.82rem; color:var(--cinza);">Desenvolvimento de Sistemas</li>
                    
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div style="
            border-top: 1px solid var(--borda);
            padding-top: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
        ">
            
        </div>

    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
