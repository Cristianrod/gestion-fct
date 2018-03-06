<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesorRepository")
 * @ORM\Table(name="profesores")
 * @UniqueEntity("nif")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @Vich\Uploadable
 */
class Profesor extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

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
     */
    private $fotografia;

    /**
     * @Vich\UploadableField(mapping="profesores_foto", fileNameProperty="fotografia")
     * @Assert\Image()
     */
    private $fichero;

    /**
     * @return mixed
     */
    public function getFichero(): ?File
    {
        return $this->fichero;
    }

    /**
     * @param $foto
     */
    public function setFichero($foto = null): void
    {
        $this->fichero = $foto;
        if (null !== $foto){
            $this->fechaSubida = new \DateTimeImmutable();
        }
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaSubida;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Ciclo", inversedBy="profesores")
     * @ORM\JoinTable(name="profesor_ciclo")
     */
    private $ciclos;

    /**
     * @return mixed
     */
    public function getCiclos()
    {
        return $this->ciclos;
    }

    public function addCiclo(Ciclo ...$ciclos)
    {
        foreach ($ciclos as $ciclo){
            if (!$this->ciclos->contains($ciclo)){
                $this->ciclos->add($ciclo);
            }
        }
    }

    public function removeCiclo(Ciclo $ciclo)
    {
        $this->ciclos->removeElement($ciclo);
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fct", mappedBy="profesor")
     */
    private $fcts;

    public function __construct()
    {
        parent::__construct();
        $this->fcts = new ArrayCollection();
        $this->ciclos = new ArrayCollection();
    }

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
        $fct->setProfesor($this);
    }

    public function removeFct(Fct $fct)
    {
        $this->fcts->removeElement($fct);
        $fct->setProfesor(null);
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
}
