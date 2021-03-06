<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\SicknessManager;

class AdviceController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */

    public function index()
    {
        $errors = [];
        $persons = [];
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $persons = array_map('trim', $_POST);
            $errors = $this->validate($persons);
            if (empty($errors)) {
                $_SESSION['persons'] = $persons;
                header('Location: /Advice/form');
            }
        }
        return $this->twig->render('Home/advice.html.twig', ['errors' => $errors,'persons' => $persons]);
    }
    private function validate(array $persons)
    {
        $errors = [];
        if (empty($persons['firstname'])) {
            $errors [] = 'Dit voir Michel, c\'est comment ton nom ?';
        }
        if (empty($persons['lastname'])) {
            $errors [] = 'Faut mettre ton prénom aussi Roger...';
        }
        if (empty($persons['country'])) {
            $errors [] = 'Tu sais pas ou t\'habites ?';
        }
        if (empty($persons['date'])) {
            $errors [] = 'Ba alors Michel tu ne connais pas la date ?';
        }
        if (empty($persons['address'])) {
            $errors [] = 'Si tu veux l\'attestation il faut avoir une maison...';
        }
        if (empty($persons['choice'])) {
            $errors [] = 'Quel est ton motif Roger ?' ;
        }
        return $errors ?? [];
    }
    public function form()
    {
        $persons = $_SESSION['persons'];
        return $this->twig->render('Home/traitement.html.twig', ['persons' => $persons]);
    }
}
