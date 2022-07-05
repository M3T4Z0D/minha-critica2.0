<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Filmes;
use App\Models\Livros;
use App\Models\Series;

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
