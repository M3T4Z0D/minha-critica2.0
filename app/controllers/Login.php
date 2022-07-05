<?php

namespace App\Controllers;

use App\Models\Usuario;
use PDOException;

class LoginController extends Controller
{

    /**
     * @var Usuario Variável que indica se um usuário está logado.
     */
    private $loggedUser;

    /**
     *  Método construtor da classe.
     *  Ao ser instanciado, inicia a seção e verifica se já existe um usuário logado.
     */
    function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }

    /** 
     * Função que coloca o usuário na home page do site
     */
    public function home(): void
    {
        $this->view('home');
    }

    /**
     *  Função que renderiza a página (visão) de login
     *  Se estiver logado, redireciona para a página do usuário.
     */
    public function loginIndex(): void
    {
        if (!$this->loggedUser) {
            $this->view('user/login');
        } else {
            header('Location: ' . BASEPATH . 'home');
        }
    }

    
    public function login(): void
    {
        $usuario = Usuario::buscarUsuario($_POST['email']);

        if ($usuario && $usuario->igual($_POST['email'], $_POST['password'])) {
            $_SESSION['user'] = $this->loggedUser = $usuario;
            $this->view('home');
        } else {
            $this->sendNotification('login', 'Usuário e/ou senha incorreta!&email='. $_POST['email'], 'error');
        }
    }

    /**
     *  Função que renderiza a página (visão) de cadastro
     */
    public function cadastroUsuario(): void
    {
        $this->view('user/register_page');
    }

    /**
     *  Função que trata de cadastrar um novo usuário na base de dados (atualmente na sessão).
     *  Verifica se o email já está cadastrado, se sim, informa o usuário.
     */
    public function cadastrar(): void
    {
        try {
            $user = new Usuario($_POST['email'], $_POST['password'], $_POST['name']);
            $user->salvar();
            $this->sendNotification('login', 'Usuário cadastrado com sucesso!&email='.$_POST['email'], 'success');
        } catch (\Throwable $th) {
            $this->sendNotification('login', 'E-mail já cadastrado!&email='.$_POST['email'], 'error');
        }
    }

    /**
     *  Função responsável por renderizar as informações do usuário (se estiver logado).
     */
    public function profile(): void
    {
        if (!$this->loggedUser) {
            $this->sendNotification('login', 'Você precisa se identificar primeiro', 'error');
            return;
        }
        $this->view('users/info', $this->loggedUser);
    }

    /**
     *  Função que remove o usuário da seção (deslogar)
     */
    public function sair(): void
    {
        unset($_SESSION['user']);
        $this->sendNotification('login', 'Usuário deslogado com sucesso!', 'success');
    }
}
