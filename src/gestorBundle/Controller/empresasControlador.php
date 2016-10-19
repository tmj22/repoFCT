<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class empresasController extends Controller
{
    public function allAction()
    {
        return $this->render('gestorBundle:Default:all.html.twig');
    }
}
