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
            'items' => $items
        ]);
    }
}
