<?php

namespace App\Controller;

use App\Model\ShopManager;

class PrivateShopController extends AbstractController
{
    public function index()
    {
        $shopManager = new ShopManager();
        $items = $shopManager->selectAll();
        return $this->twig->render('Admin/adminShop.html.twig', [
            'items' => $items,
        ]);
    }

    public function add()
    {
        $errors = [];
        $shopManager = new ShopManager();
        $cards = $shopManager->selectAll();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $item = array_map('trim', $_POST);
            $errors = $this->validate($item);
            if (empty($errors)) {
                $uploadDir = 'uploads/';
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $uploadFile = $uploadDir . basename($filename);
                move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);
                $item['picture'] = $filename;
                $shopManager = new ShopManager();
                $shopManager->add($item);
                header('Location: /PrivateShop/index');
            }
        }
        return $this->twig->render('Admin/adminShop.html.twig', [
            'errors' => $errors,
            'cards' => $cards
        ]);
    }

    public function validate(array $item)
    {
        $errors = [];
        $mime = ['image/jpeg', 'image/png', 'image/gif'];

        if (empty($item['name'])) {
            $errors[] = 'Le champ concernant le titre ne doit pas être vide';
        }
        if (empty($_FILES['picture']['name'])) {
            $errors[] = "Erreur! Aucune image séléctionnée.";
        }
        if ($_FILES['picture']['size'] > 1000000) {
            $errors[] = "Erreur! Image trop volumineuse.";
        }

        if (!in_array($_FILES['picture']['type'], $mime)) {
            $errors[] = "Erreur! Type d'image invalide.";
        }
        return $errors;
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $id = $_POST['id'];
            $shopManager = new ShopManager();
            $shopManager->delete($id);
            header('Location: /PrivateShop/index');
        }
    }
}
