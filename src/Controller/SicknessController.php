<?php

namespace App\Controller;

use App\Model\SicknessManager;

class SicknessController extends AbstractController
{

    public function sickness()
    {
        $info = new SicknessManager();
        $data = $info->getPrinciple();
        return $this->twig->render('Sickness/sickness.html.twig', ['datas' => $data]);
    }
}
