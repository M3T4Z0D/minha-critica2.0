<?php

namespace App\Models;

use App\Database;
use ArrayObject;

class Livro
{

    private $titulo;    //titulo do livro
    private $genero;    //genero
    private $ano;       //ano de lançamento string
    private $autor;     //autor
    private $sinopse;   //sinopse
    private $caminhoimg; //imagem

    function __construct(string $caminhoimg, string $titulo, string $genero, string $ano, string $sinopse, string $autor)
    {
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
        $this->sinopse = $sinopse;
        $this->autor = $autor;
        $this->$caminhoimg = $caminhoimg;
    }

    public function __get($campo)
    {
        return $this->$campo;
    }

    public function __set($campo, $valor)
    {
        return $this->$campo = $valor;
    }

    public function salvar(): void
    {
        $con = Database::getConnection();

        $stm = $con->prepare('INSERT INTO Livros (caminhoimg, titulo, ano, genero, autor, sinopse) VALUES (:caminhoimg, :titulo, :ano, :genero, :autor, :sinopse)');
        $stm->bindValue(':titulo', $this->titulo);
        $stm->bindValue(':ano', $this->ano);
        $stm->bindValue(':genero', $this->genero);
        $stm->bindValue(':autor', $this->autor);
        $stm->bindValue(':sinopse', $this->sinopse);
        $stm->bindValue(':caminhoimg', $this->caminhoimg);
        $stm->execute();
    }

    static public function buscarLivro($titulo): ?Livro
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT caminhoimg,titulo, ano, genero, autor, sinopse FROM Livros WHERE titulo = :titulo');
        $stm->bindParam(':titulo', $titulo);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $livro = new Livro($resultado['caminhoimg'], $resultado['titulo'], $resultado['ano'], $resultado['genero'], $resultado['autor'], $resultado['sinopse']);
            return $livro;
        } else {
            return NULL;
        }
    }

    // Função que retorna todos as livros cadastradas.
    static public function buscarTodos(): array
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT caminhoimg, titulo, ano, genero, autor, sinopse FROM Livros ORDER BY titulo');
        $stm->execute();

        $resultados = [];

        while ($resultado = $stm->fetch()) {
            $livro = new Livro($resultado['caminhoimg'], $resultado['titulo'], $resultado['ano'], $resultado['genero'], $resultado['autor'], $resultado['sinopse']);
            array_push($resultados, $livro);
        }
        return $resultados;
    }
}
