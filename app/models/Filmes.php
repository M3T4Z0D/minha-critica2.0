<?php

namespace App\Models;

use App\Database;
use ArrayObject;

class Filme
{
    private $titulo;    //titulo do filme
    private $genero;    //genero
    private $ano;       //ano de lançamento string
    private $elenco;    //elenco
    private $duracao;   //duracao string
    private $sinopse;   //sinopse
    private $caminhoimg; //imagem

    function __construct(string $titulo, string $genero, string $ano, string $sinopse, string $duracao, string $elenco, string $caminhoimg)
    {
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
        $this->sinopse = $sinopse;
        $this->duracao = $duracao;
        $this->elenco = $elenco;
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

        $stm = $con->prepare('INSERT INTO Filmes (titulo, ano, genero, elenco, duracao, sinopse,caminhoimg) VALUES (:titulo, :ano, :genero, :elenco, :duracao, :sinopse, :caminhoimg)');
        $stm->bindValue(':titulo', $this->titulo);
        $stm->bindValue(':ano', $this->ano);
        $stm->bindValue(':genero', $this->genero);
        $stm->bindValue(':elenco', $this->elenco);
        $stm->bindValue(':duracao', $this->duracao);
        $stm->bindValue(':sinopse', $this->sinopse);
        $stm->bindValue(':caminhoimg', $this->caminhoimg);
        $caminhoimg = $_FILES['caminhoimg'];
        $nomeArquivo = 'caminhoimg' . $$caminhoimg = $_FILES['caminhoimg'];
        $nomeArquivo = 'caminhoimg' . $caminhoimg['name'];
        $diretorio = __DIR__ . '\..\..\public\img';

        $stm->execute(
            array('nome' => $_POST['nome'], 'tipo' => $_POST['tipo'], 'descricao' => $_POST['descricao'], 'imagem' => $_POST['imagem'])
        );
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio  . "\\" . $nomeArquivo);
        ['name'];
    }

    static public function buscarFilme($titulo): ?Filme
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT titulo, ano, genero, elenco, duracao, sinopse,caminhoimg FROM Filmes WHERE titulo = :titulo');
        $stm->bindParam(':titulo', $titulo);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $filme = new Filme($resultado['titulo'], $resultado['ano'], $resultado['genero'], $resultado['elenco'], $resultado['duracao'], $resultado['sinopse'], $resultado['caminhoimg']);
            return $filme;
        } else {
            return NULL;
        }
    }

    // Função que retorna todos os filmes cadastrados.
    static public function buscarTodos(): array
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT titulo, ano, genero, elenco, duracao, sinopse,caminhoimg FROM Filmes ORDER BY titulo');
        $stm->execute();

        $resultados = [];

        while ($resultado = $stm->fetch()) {
            $filme = new Filme($resultado['titulo'], $resultado['ano'], $resultado['genero'], $resultado['elenco'], $resultado['duracao'], $resultado['sinopse'], $resultado['caminhoimg']);
            array_push($resultados, $filme);
        }

        return $resultados;
    }
}
