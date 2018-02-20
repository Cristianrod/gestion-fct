<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FctRepository")
 */
class Fct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(type="string")
     */
    private $periodo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Profesor", inversedBy="fcts")
     */
    private $profesor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Alumno", inversedBy="fcts")
     */
    private $alumno;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="fcts")
     */
    private $empresa;
}
