<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesorRepository")
 * @ORM\Table(name="profesores")
 * @UniqueEntity("nif")
 */
class Profesor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Regex(
     *     pattern="/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i",
     *     message="valid.nif")
     * @Assert\NotBlank()
     */
    private $nif;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=false
     * )
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=false
     * )
     * @Assert\NotBlank()
     */
    private $apellido1;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=false
     * )
     * @Assert\NotBlank()
     */
    private $apellido2;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Image()
     */
    private $fotografia;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $usuario;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/^(\+34|0034|34)?[6|7][0-9]{8}$/",
     *     message="valid.movil"
     * )
     */
    private $movil;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Regex(
     *     pattern="/^(\+34|0034|34)?[9][0-9]{8}$/",
     *     message="valid.fijo"
     * )
     */
    private $fijo;

    /**
     * @Assert\Email(
     *     message="valid.correo"
     * )
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100)
     */
    private $correo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fct", mappedBy="profesor")
     */
    private $fcts;

    public function __construct()
    {
        $this->fcts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getFcts()
    {
        return $this->fcts;
    }

    /**
     * @param mixed $fcts
     */
    public function setFcts($fcts): void
    {
        $this->fcts = $fcts;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif): void
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * @param mixed $apellido1
     */
    public function setApellido1($apellido1): void
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * @return mixed
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * @param mixed $apellido2
     */
    public function setApellido2($apellido2): void
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * @return mixed
     */
    public function getFotografia()
    {
        return $this->fotografia;
    }

    /**
     * @param mixed $fotografia
     */
    public function setFotografia($fotografia): void
    {
        $this->fotografia = $fotografia;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * @param mixed $movil
     */
    public function setMovil($movil): void
    {
        $this->movil = $movil;
    }

    /**
     * @return mixed
     */
    public function getFijo()
    {
        return $this->fijo;
    }

    /**
     * @param mixed $fijo
     */
    public function setFijo($fijo): void
    {
        $this->fijo = $fijo;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }
}
