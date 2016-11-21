<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\profe;
use gestorBundle\Form\profeType;
use Symfony\Component\HttpFoundation\Request;

class profeController extends Controller
{

      public function allAction()
      {
          $repository = $this->getDoctrine()->getRepository('gestorBundle:profe');
          $profe = $repository->findAll();
          return $this->render('gestorBundle:Default:allprofe.html.twig',array('profe' => $profe));
      }


      public function nuevoAction(Request $request)
      {
          $profe = new profe();
          $form = $this->createForm(profeType::class,$profe);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

         // $form->getData() holds the submitted values

         // but, the original `$task` variable has also been updated

         $profe = $form->getData();



         // ... perform some action, such as saving the task to the database

         // for example, if Task is a Doctrine entity, save it!

         $em = $this->getDoctrine()->getManager();

         $em->persist($profe);

         $em->flush();



         return $this->redirectToRoute('all_profe', array('status'=>'OK'));

         }

          return $this->render('gestorBundle:Default:nuevoprofe.html.twig',array('form' => $form->createView()));
      }
}
