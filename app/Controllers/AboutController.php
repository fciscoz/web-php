<?php

class AboutController
{
    public function index()
    {
        $title = 'About';
        require __DIR__.'/../../resources/about.template.php';
    }
}
