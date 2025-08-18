<?php

class LinkController
{
  public function index()
  {
    $title = 'Links';

    global $db;
    $links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();
    require __DIR__ . '/../../resources/links.template.php';
  }

  public function create()
  {
    $title = 'Registrar proyecto';
    require __DIR__ . '/../../resources/create_link.template.php';
  }

  public function store()
  {
    global $db;

    $validator = new Validator($_POST, [
        'title'         => 'required|min:3|max:190',
        'url'           => 'required|url|max:190',
        'description'   => 'required|min:3|max:500',
    ]);

    if ($validator->passes()) {
      $db->query('INSERT INTO links (title, url, description) VALUES (?, ?, ?)', [$_POST['title'], $_POST['url'], $_POST['description']]);
      header('Location: /links');
      exit;
    }
    
    $errors = $validator->errors();

    $title = 'Registrar proyecto';
    require __DIR__ . '/../../resources/create_link.template.php';
    

  }
}
