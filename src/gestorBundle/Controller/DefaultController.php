<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('gestorBundle:Default:index.html.twig');
    }

    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('gestorBundle:empresas');
        $events = $repository->findAll();
        return $this->render('gestorBundle:Default:all.html.twig',array('eventos' => $events));
    }
}
