<?php

namespace App\Controller;

class FaqController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Faq/faq.html.twig');
    }
}
