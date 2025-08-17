<?php

$title = 'Registrar Proyecto';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';

    $errors = [];

    if (! $title) {
        $errors[] = 'El t�tulo es requerido';
    }

    if (! $url) {
        $errors[] = 'La URL es requerida';
    } elseif (! filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'La URL no es v�lida';
    }

    if (! $description) {
        $errors[] = 'La descripci�n es requerida';
    }

    if (empty($errors)) {
      $db->query('INSERT INTO links (title, url, description) VALUES (?, ?, ?)', [$title, $url, $description]);
      header('Location: /links');
      exit;
    }
}

require __DIR__.'/../../resources/links-create.template.php';