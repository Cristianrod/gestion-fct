<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesorRepository")
 * @ORM\Table(name="profesores")
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
}
