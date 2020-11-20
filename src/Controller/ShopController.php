<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ShopManager;

class ShopController extends AbstractController
{
    public function shop()
    {
        $shopManager = new ShopManager();
        $items = $shopManager->selectAll();
        return $this->twig->render('Shop/shop.html.twig', [
            'items' => $items,
        ]);
    }

    public function choice(int $id)
    {
        $shopManager = new ShopManager();
        $select = $shopManager->selectOneById($id);

        return $this->twig->render('Shop/choice.html.twig', [
            'item' => $select,
        ]);
    }

    public function validate()
    {
        $profil = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profil = array_map('trim', $_POST);
        }
        return $this->twig->render('Shop/validate.html.twig', [
            'profil' => $profil,
        ]);
    }
}
