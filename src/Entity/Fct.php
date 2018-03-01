<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FctRepository")
 * @ORM\Table(name="fcts")
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ciclo", inversedBy="fcts")
     */
    private $ciclo;

    /**
     * @return mixed
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * @param mixed $ciclo
     */
    public function setCiclo($ciclo): void
    {
        $this->ciclo = $ciclo;
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
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param mixed $anio
     */
    public function setAnio($anio): void
    {
        $this->anio = $anio;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo): void
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * @param mixed $profesor
     */
    public function setProfesor($profesor): void
    {
        $this->profesor = $profesor;
    }

    /**
     * @return mixed
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * @param mixed $alumno
     */
    public function setAlumno($alumno): void
    {
        $this->alumno = $alumno;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa): void
    {
        $this->empresa = $empresa;
    }
}
