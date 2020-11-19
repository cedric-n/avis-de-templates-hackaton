<?php

namespace App\Controller;

class UnderstandController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('understand/understand.html.twig');
    }
}

