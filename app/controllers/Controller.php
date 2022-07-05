<?php

namespace App\Controllers;

/**
 * Esta classe é responsável por chamar a view correta
 * passando os dados que serão usados.
 */
abstract class Controller
{
    /**
     * Este método é chama uma determinada view (página).
     *
     * @param  string  $view   A view que será chamada (ou requerida)
     * @param  array   $data   São os dados que serão exibido na view
     */
    public function view(string $view, $data = []): void
    {
        require  __DIR__ . '/../views/' . $view . '.php';
    }

    /**
     * $location é a rota para onde enviaremos o usuário;
     * $message é a mensagem que você deseja apresentar no Toast;
     * Ícones disponíveis: warning, error, success, info, question;
     */
    public function sendNotification(string $location = 'home', $message = 'Ocorreu um erro durante o processamento', $icon = 'warning'): void
    {
        header('Location: ' . BASEPATH . $location. '?message=' . $message . '&icon=' . $icon);
    }
}
