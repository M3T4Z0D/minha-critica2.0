<?php

namespace App\Controllers;

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
        if (isset($_SESSION['user'])){
            $this->loggedUser = $_SESSION['user'];  
        } 
    }

    public function buscaFilmes(): void
    {
        if (!$this->loggedUser) {
            $this->view('user/login');
        } else {
            header('Location: ' . BASEPATH . 'media/movie_search_page');
        }
    }

}
