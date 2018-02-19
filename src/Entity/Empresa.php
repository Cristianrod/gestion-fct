<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 * @ORM\Table(name="empresas")
 */
class Empresa
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
    private $cif;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     */
    private $nombreTutor;

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
}
