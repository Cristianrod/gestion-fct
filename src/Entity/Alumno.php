<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlumnoRepository")
 * @ORM\Table(name="alumnos")
 */
class Alumno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nif;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     */
    private $apellido1;

    /**
     * @ORM\Column(type="string")
     */
    private $apellido2;

    /**
     * @ORM\Column(type="string")
     */
    private $fotografia;

    /**
     * @ORM\Column(type="string")
     */
    private $usuario;

    /**
     * @ORM\Column(type="string")
     */
    private $direccion;

    /**
     * @ORM\Column(type="string")
     */
    private $poblacion;

    /**
     * @ORM\Column(type="integer")
     */
    private $codpostal;

    /**
     * @ORM\Column(type="integer")
     */
    private $provincia;

    /**
     * @ORM\Column(type="integer")
     */
    private $movil;

    /**
     * @ORM\Column(type="integer")
     */
    private $fijo;

    /**
     * @ORM\Column(type="string")
     */
    private $correo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ciclo", inversedBy="alumnos")
     */
    private $ciclo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fct", mappedBy="alumno")
     */
    private $fcts;

    public function __construct()
    {
        $this->fcts = new ArrayCollection();
    }
}
