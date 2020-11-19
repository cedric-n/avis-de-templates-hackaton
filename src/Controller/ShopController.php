<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ShopController extends AbstractController
{
    public function shop()
    {
        return $this->twig->render('Shop/shop.html.twig');
    }
}