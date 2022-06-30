<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('app/views/head.php') ?>
    <title>Minha Crítica</title>
    <link href="<?= BASEPATH  ?>/public/css/home.css" rel="stylesheet">
</head>

<body>
    <?php include('app/views/navbar.php') ?>

    <div class="corpo">
        <?php if ($lista != null) { ?>

            <div class="movies">
                <div class="movies-quad">
                    <a href="src\views\movie_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<?= $filmes->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $filmes->titulo ?></div>
                            <div class="ano">Ano: <?= $filmes->ano ?></div>
                            <div class="duracao">Duração: <?= $filmes->duracao ?></div>
                            <div class="gênero">Gênero: <?= $filmes->genero ?></div>
                            <div class="elenco">Elenco: <?= $filmes->elenco ?></div>
                        </div>
                    </a>
                </div>
                <div class="movies-quad">
                    <a href="src\views\movie_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $filmes->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $filmes->titulo ?></div>
                            <div class="ano">Ano: <?= $filmes->ano ?></div>
                            <div class="duracao">Duração: <?= $filmes->duracao ?></div>
                            <div class="gênero">Gênero: <?= $filmes->genero ?></div>
                            <div class="elenco">Elenco: <?= $filmes->elenco ?></div>
                        </div>
                    </a>
                </div>
                <div class="movies-quad">
                    <a href="src\views\movie_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $filmes->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $filmes->titulo ?></div>
                            <div class="ano">Ano: <?= $filmes->ano ?></div>
                            <div class="duracao">Duração: <?= $filmes->duracao ?></div>
                            <div class="gênero">Gênero: <?= $filmes->genero ?></div>
                            <div class="elenco">Elenco: <?= $filmes->elenco ?></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="series">
                <div class="series-quad">
                    <a href="src\views\series_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $serie->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $serie->titulo ?></div>
                            <div class="ano">Ano: <?= $serie->ano ?></div>
                            <div class="gênero">Gênero: <?= $serie->genero ?></div>
                            <div class="elenco">Elenco: <?= $serie->elenco ?></div>
                            <div class="avaliacao">Avaliação: <?= $serie->avaliacao ?></div>
                        </div>
                    </a>
                </div>
                <div class="series-quad">
                    <a href="src\views\series_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $serie->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $serie->titulo ?></div>
                            <div class="ano">Ano: <?= $serie->ano ?></div>
                            <div class="gênero">Gênero: <?= $serie->genero ?></div>
                            <div class="elenco">Elenco: <?= $serie->elenco ?></div>
                            <div class="avaliacao">Avaliação: <?= $serie->avaliacao ?></div>
                        </div>
                    </a>
                </div>
                <div class="series-quad">
                    <a href="src\views\series_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $serie->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $serie->titulo ?></div>
                            <div class="ano">Ano: <?= $serie->ano ?></div>
                            <div class="gênero">Gênero: <?= $serie->genero ?></div>
                            <div class="elenco">Elenco: <?= $serie->elenco ?></div>
                            <div class="avaliacao">Avaliação: <?= $serie->avaliacao ?></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="books">
                <div class="books-quad">
                    <a href="src\views\books_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $livro->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $livro->titulo ?></div>
                            <div class="ano">Ano: <?= $livro->ano ?></div>
                            <div class="gênero">Gênero: <?= $livro->genero ?></div>
                            <div class="editora"> Editora: <?= $livro->editora ?></div>
                            <div class="autor">Autor: <?= $livro->autor ?></div>
                            <div class="avaliacao">Avaliação: <?= $livro->avaliacao ?></div>
                        </div>
                    </a>
                </div>
                <div class="books-quad">
                    <a href="src\views\books_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $livro->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $livro->titulo ?></div>
                            <div class="ano">Ano: <?= $livro->ano ?></div>
                            <div class="gênero">Gênero: <?= $livro->genero ?></div>
                            <div class="editora"> Editora: <?= $livro->editora ?></div>
                            <div class="autor">Autor: <?= $livro->autor ?></div>
                            <div class="avaliacao">Avaliação: <?= $livro->avaliacao ?></div>
                        </div>
                    </a>
                </div>
                <div class="books-quad">
                    <a href="src\views\books_search_page.php" target="_parent" class="menu__item">
                        <div class="img">
                            <img src=<? $livro->caminhoimg ?> />
                        </div>
                        <div class="txt">
                            <div class="titulo">Título: <?= $livro->titulo ?></div>
                            <div class="ano">Ano: <?= $livro->ano ?></div>
                            <div class="gênero">Gênero: <?= $livro->genero ?></div>
                            <div class="editora"> Editora: <?= $livro->editora ?></div>
                            <div class="autor">Autor: <?= $livro->autor ?></div>
                            <div class="avaliacao">Avaliação: <?= $livro->avaliacao ?></div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="empty">
                <div class="title" style="color:white">
                    <h2>Desculpe, mas não temos registro no banco.</h2>
                </div>
                <div class="subtitle" style="color: whitesmoke;">
                    <p>Que tal fazer o primeiro registro? Faça o <a href="./src/views/register_page.php">cadastro</a> e comece.</p>
                </div>

            </div>
        <?php } ?>
    </div>

</body>

</html>