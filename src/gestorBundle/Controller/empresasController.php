<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresas;
use gestorBundle\Form\empresasType;
use Symfony\Component\HttpFoundation\Request;

class empresasController extends Controller
{

      public function allAction()
      {
          $repository = $this->getDoctrine()->getRepository('gestorBundle:empresas');
          $empresas = $repository->findAll();
          return $this->render('gestorBundle:Default:all.html.twig',array('empresas' => $empresas));
      }

      public function nuevoAction(Request $request)
      {
          $empresa = new empresas();
          $form = $this->createForm(empresasType::class,$empresa);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

         // $form->getData() holds the submitted values

         // but, the original `$task` variable has also been updated

         $empresa = $form->getData();



         // ... perform some action, such as saving the task to the database

         // for example, if Task is a Doctrine entity, save it!

         $em = $this->getDoctrine()->getManager();

         $em->persist($empresa);

         $em->flush();



         return $this->redirectToRoute('all_empresas', array('status'=>'OK'));

         }

          return $this->render('gestorBundle:Default:nuevo.html.twig',array('form' => $form->createView()));
      }
}
