<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProvinciaRepository")
 * @ORM\Table(name="provincias")
 */
class Provincia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="App\Entity\Alumno", mappedBy="provincia")
     */
    private $alumnos;
    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
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
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumno $alumno): void
    {
        if ($this->alumnos->contains($alumno)) {
            return;
        }
        $this->alumnos[] = $alumno;
        $alumno->setProvincia($this);
    }

    public function removeAlumno(Alumno $alumno): void
    {
        $this->alumnos->removeElement($alumno);
        $alumno->setProvincia(null);
    }

}
