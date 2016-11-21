<?php

namespace gestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity(repositoryClass="gestorBundle\Repository\alumnosRepository")
 */
class alumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=50)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=50)
     */
    private $ciclo;


     /**
      * @ORM\ManyToOne(targetEntity="empresas", inversedBy="alumnos")
      * @ORM\JoinColumn(name="empresas_id", referencedColumnName="id")
      */
     private $empresa;


     /**
      * @ORM\ManyToOne(targetEntity="profe", inversedBy="alumnos")
      * @ORM\JoinColumn(name="profe_id", referencedColumnName="id")
      */
     private $profe;


    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return alumnos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return alumnos
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return alumnos
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set ciclo
     *
     * @param string $ciclo
     *
     * @return alumnos
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }
    public function setEmpresa(\gestorBundle\Entity\empresas $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \gestorBundle\Entity\empresas
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }






    public function setProfe(\gestorBundle\Entity\profe $profe = null)
    {
        $this->profe = $profe;

        return $this;
    }

    /**
     * Get profe
     *
     * @return \gestorBundle\Entity\profe
     */
    public function getProfe()
    {
        return $this->profe;
    }

}
