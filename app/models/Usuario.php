<?php

namespace App\Models;

use App\Database;
use ArrayObject;

/**
 * Classe reponsável por representar os dados de um usuário na aplicação
 */
class Usuario
{

    private $id;

    /**
     * @var string Email do usuário
     */
    private $email;

    /**
     * @var string Senha (codificada) do usuário
     */
    private $senha;

    /**
     * @var string Nome fornecido pelo usuário
     */
    private $nome;

    /**
     *  Contrutor da classe, responsável por inicializar os dados.
     *  A senha é codificada usando sha256.
     */
    function __construct(string $email, string $senha, string $nome)
    {
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->nome = $nome;
    }


    /**
     *  Método get genérico para todos os campos
     */
    public function __get($campo)
    {
        return $this->$campo;
    }

    /**
     *  Método set genérico para todos os campos
     */
    public function __set($campo, $valor)
    {
        return $this->$campo = $valor;
    }

    /**
     *  Função que auxilia na verificação da identidade fornecida.
     *  Para isso, os dados providos são comparados com a instância atual.
     */
    public function igual(string $email, string $senha): bool
    {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }


    /**
     *  Função que salva os dados do usuário no banco de dados
     */
    public function salvar(): void
    {
        $con = Database::getConnection();

        $stm = $con->prepare('INSERT INTO Usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $stm->bindValue(':nome', $this->nome);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':senha', $this->senha);
        $stm->execute();
    }


    /**
     *  Função que busca por um usuário a partir do email fornecido.
     *  Se não existir, emite um erro.
     */
    static public function buscarUsuario($email): ?Usuario
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT email, nome, senha FROM Usuarios WHERE email = :email');
        $stm->bindParam(':email', $email);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return NULL;
        }
    }

    /**
     *  Função que busca por um usuário a partir do id fornecido.
     *  Se não existir, emite um erro.
     */
    static public function buscarUsuarioPorId($id): ?Usuario
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT id, email, nome, senha FROM Usuarios WHERE id = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->id = $resultado['id'];
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return NULL;
        }
    }

    /**
     * Função para buscar todos os usuários cadastrados
     */
    static public function buscarTodosUsuarios(): array
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT * FROM Usuarios');
        $stm->execute();
        
        $result = $stm->fetchAll();
        if (!$result){
            return NULL;
        }

        $usuarios = array();
        
        foreach ($result as $user) {
            $usuario = new Usuario($user['email'], $user['senha'], $user['nome']);
            $usuario->id = $user['id'];
            $usuario->senha = $user['senha'];

            array_push($usuarios, $usuario);
        }
        
        return $usuarios;
    }
}
