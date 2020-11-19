<?php

namespace App\Controller;

use App\Model\ItemManager;
use Symfony\Component\DependencyInjection\Argument\AbstractArgument;

class PlagueController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Plague/stopPlague.html.twig');
    }
}
