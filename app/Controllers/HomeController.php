<?php

class HomeController
{
    public function index()
    {
        $title = 'Home';
        global $db; // Assuming $db is defined globally
        // $db = new Database();
        $posts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 6')->get();

        require __DIR__.'/../../resources/home.template.php';
    }
}
