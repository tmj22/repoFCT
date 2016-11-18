<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresas;
use Symfony\Component\HttpFoundation\JsonResponse;

class APIController extends Controller
{

  public function empresasAction(){
    $repository = $this->getDoctrine()->getRepository('gestorBundle:empresas');
    $empresas = $repository->findAll();
    $data = array('empresas' => array());
    foreach ($empresas as $empresa) {
      $data['empresas'][] = $this->serializeEmpresa($empresa);
      }
      $response = new JsonResponse($data, 400);
      return $response;
    }

    private function serializeEmpresa(empresas $empresa)
    {
      return array(
        'nombre' => $empresa->getNombre(),
        'direccion' => $empresa->getDireccion(),
        'cp' => $empresa->getCp(),
        'telefono1' => $empresa->getTelefono1(),
        'telefono2' => $empresa->getTelefono2(),
        'fechaCreacion' => $empresa->getFechaCreacion(),
      );
    }
}
?>
