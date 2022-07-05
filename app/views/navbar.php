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

        <?php
            $loggedUser = $_SESSION['user'];
            if(isset($loggedUser)){
        ?>

        <a href="<?= BASEPATH  ?>adicionarMidia" target="_parent" class="menu__item">Adicionar Midia</a>
            
        <?php
            }
        ?>
    </div>

    <div class="nav_actions">
        <?php
        $loggedUser = $_SESSION['user'];
        if (!$loggedUser) {
        ?>
            <a href="<?= BASEPATH  ?>login" target="_parent">Entrar</a>
            <a href="<?= BASEPATH  ?>user/register" target="_parent">Registrar</a>
        <?php
        } else {
        ?>
            <div class="dropdown">
                <button class="dropbtn"><?php  echo $loggedUser->nome ?> <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    <a href="<?= BASEPATH  ?>logout" target="_parent">Sair</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</nav>