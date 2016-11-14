<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\alumnos;

class alumnosController extends Controller
{

      public function allAction()
      {
          $repository = $this->getDoctrine()->getRepository('gestorBundle:alumnos');
          $alumnos = $repository->findAll();
          return $this->render('gestorBundle:Default:allalumnos.html.twig',array('alumnos' => $alumnos));
      }
}
