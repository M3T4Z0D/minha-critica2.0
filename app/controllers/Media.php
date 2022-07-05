<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Filme;
use App\Models\Livro;
use App\Models\Serie;

use PDOException;

class MediaController extends Controller
{

    /**
     * @var Usuario Variável que indica se um usuário está logado.
     */
    private $loggedUser;

    function __construct()
    {
        if (isset($_SESSION['user'])) {
            $this->loggedUser = $_SESSION['user'];
        }
    }

    /**
     *  Função que trata de cadastrar um novo filme na base de dados (atualmente na sessão).
     *  Verifica se o titulo já está cadastrado, se sim, informa o usuário.
     */
    public function cadastrarFilme(): void
    {
        try {
            $filme = new Filme($_POST['titulo'], $_POST['ano'], $_POST['genero'], $_POST['elenco'], $_POST['duracao'], $_POST['sinopse'], $_POST['caminhoimg'],);
            $filme->salvar();
            $this->sendNotification('buscarFilmes', 'Filme cadastrado com sucesso.&titulo='.$_POST['titulo'], 'success');
        } catch (\Throwable $th) {
            $this->sendNotification('adicionaMidia', 'Filme já cadastrado!&titulo=' . $_POST['titulo'], 'error');
        }
    }

    /**
     *  Função que trata de cadastrar uma nova serie na base de dados (atualmente na sessão).
     *  Verifica se o titulo já está cadastrado, se sim, informa o usuário.
     */
    public function cadastrarSerie(): void
    {
        try {
            $filme = new Serie($_POST['titulo'], $_POST['ano'], $_POST['genero'], $_POST['elenco'], $_POST['sinopse'], $_POST['caminhoimg'],);
            $filme->salvar();
            $this->sendNotification('buscarSeries', 'Série cadastrada com sucesso!&titulo='.$_POST['titulo'], 'success');
        } catch (\Throwable $th) {
            $this->sendNotification('adicionaMidia', 'Série já cadastrado!&titulo=' . $_POST['titulo'], 'error');
        }
    }

    /**
     *  Função que trata de cadastrar um novo livro na base de dados (atualmente na sessão).
     *  Verifica se o titulo já está cadastrado, se sim, informa o usuário.
     */
    public function cadastrarLivro(): void
    {
        try {
            $filme = new Livro($_POST['titulo'], $_POST['ano'], $_POST['genero'], $_POST['autor'], $_POST['editora'], $_POST['sinopse'], $_POST['caminhoimg'],);
            $filme->salvar();
            $this->sendNotification('buscaLivros', 'Livro cadastrado com sucesso!&titulo='.$_POST['titulo'], 'success');
        } catch (\Throwable $th) {
            $this->sendNotification('adicionaMidia', 'Livro já cadastrado!&titulo=' . $_POST['titulo'], 'error');
        }
    }

    public function buscaFilmes(): void
    {
        $this->view('media/movie_search_page');
    }
    public function buscaSeries(): void
    {
        $this->view('media/serie_search_page');
    }
    public function buscaLivros(): void
    {
        $this->view('media/book_search_page');
    }
    public function adicionamedia(): void
    {
        if(!$this->loggedUser){
            $this->sendNotification('login', 'É necessário estar logado para acessar esta página.', 'error');
            return;
        }
        $this->view('media/media_register_page');
    }
}
