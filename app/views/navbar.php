<nav>
    <div class="nav__logo">
        <span class="logo__text">MINHA CRÍTICA</span>
    </div>

    <div class="nav__menu">
        <a href="<?= BASEPATH  ?>home" target="_parent" class="menu__item">Home</a>
        <a href="<?= BASEPATH  ?>buscaFilmes" target="_parent" class="menu__item">Filmes</a>
        <a href="<?= BASEPATH  ?>buscaSeries" target="_parent" class="menu__item">Séries</a>
        <a href="<?= BASEPATH  ?>buscaLivros" target="_parent" class="menu__item">Livros</a>
        <a href="/minhacritica2.0/app/views/user/kanban-usuario.php" target="_parent" class="menu__item">Kanban</a>
    </div>

    <div class="nav_actions">
        <?php
            $loggedUser = $_SESSION['user'];
            if(!$loggedUser){
        ?>
        <a href="<?= BASEPATH  ?>login" target="_parent">Entrar</a>
        <a href="<?= BASEPATH  ?>user/register" target="_parent">Registrar</a>
        <?php
            }
            else{
        ?>
        <a href="<?= BASEPATH  ?>logout" target="_parent">Sair</a>
        <?php
            }
        ?>
    </div>
</nav>