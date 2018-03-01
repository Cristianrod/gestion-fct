<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CicloRepository")
 * @ORM\Table(name="ciclos")
 * @UniqueEntity("codigo")
 */
class Ciclo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $codigo;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $grado;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $horas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alumno", mappedBy="ciclo")
     */
    private $alumnos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fct", mappedBy="ciclo")
     */
    private $fcts;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Profesor", mappedBy="ciclos")
     */
    private $profesores;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
        $this->fcts = new ArrayCollection();
        $this->profesores = new ArrayCollection();
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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
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
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * @param mixed $grado
     */
    public function setGrado($grado): void
    {
        $this->grado = $grado;
    }

    /**
     * @return mixed
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * @param mixed $horas
     */
    public function setHoras($horas): void
    {
        $this->horas = $horas;
    }

    /**
     * @return mixed
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumno $alumno)
    {
        if ($this->alumnos->contains($alumno)){
            return;
        }
        $this->alumnos[] = $alumno;
        $alumno->setCiclo($this);
    }

    public function removeAlumno(Alumno $alumno)
    {
        $this->alumnos->removeElement($alumno);
        $alumno->setCiclo(null);
    }

    /**
     * @return mixed
     */
    public function getFcts()
    {
        return $this->fcts;
    }

    public function addFct(Fct $fct)
    {
        if ($this->fcts->contains($fct)){
            return;
        }
        $this->fcts[] = $fct;
        $fct->setCiclo($this);
    }

    public function removeFct(Fct $fct)
    {
        $this->fcts->removeElement($fct);
        $fct->setCiclo(null);
    }

    /**
     * @return mixed
     */
    public function getProfesores()
    {
        return $this->profesores;
    }

    public function addProfesor(Profesor ...$profesores)
    {
        foreach ($profesores as $profesor){
            if (!$this->profesores->contains($profesor)){
                $this->profesores->add($profesor);
            }
        }
    }

    public function removeProfesor(Profesor $profesor)
    {
        $this->profesores->removeElement($profesor);
    }

}
