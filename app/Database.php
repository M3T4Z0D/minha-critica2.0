<?php

namespace App;

use PDO;

/**
 *  Classe responsável por fazer a gestão da conexão com o banco.
 */
class Database
{
    static $con;

    static public function getConnection(): PDO
    {
        if (isset(self::$con)) return self::$con;

        self::$con = new PDO('sqlite:minhacritica-db.sqlite');
        self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$con;
    }

    static public function createSchema(): void
    {
        $con = self::getConnection();
        $con->exec('
            CREATE TABLE IF NOT EXISTS Usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome  TEXT,
                email TEXT UNIQUE,
                senha TEXT 
            )
        ');
        $con->exec('
            CREATE TABLE IF NOT EXISTS Filmes (
                FilmesId INTEGER PRIMARY KEY AUTOINCREMENT,
                titulo TEXT UNIQUE,
                ano TEXT,
                genero TEXT,
                elenco TEXT,
                duracao TEXT,
                sinopse TEXT,
                caminhoimg TEXT
            )
        ');
        $con->exec('
            CREATE TABLE IF NOT EXISTS Series (
                SeriesId INTEGER PRIMARY KEY AUTOINCREMENT,
                titulo TEXT UNIQUE,
                ano TEXT,
                genero TEXT,
                elenco TEXT,
                sinopse TEXT,
                caminhoimg TEXT
            )
        ');
        $con->exec('
            CREATE TABLE IF NOT EXISTS Livros (
                LivrosId INTEGER PRIMARY KEY AUTOINCREMENT,
                titulo TEXT UNIQUE,
                ano TEXT,
                genero TEXT,
                autor TEXT,
                sinopse TEXT,
                caminhoimg TEXT
            )
        ');
        $con->exec('
            CREATE TABLE IF NOT EXISTS Critica (
                CriticaId INTEGER PRIMARY KEY AUTOINCREMENT,
                comentario TEXT
            )
        ');
    }
}
