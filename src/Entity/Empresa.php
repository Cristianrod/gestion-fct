<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Regex(
     *     pattern="/^([ABCDEFGHJKLMNPQRSUVW])(\d{7})([0-9A-J])$/",
     *     message="valid.cif"
     * )
     * @Assert\NotBlank()
     */
    private $cif;

    /**
     * @ORM\Column(type="string", length=70)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=false
     * )
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=false
     * )
     * @Assert\NotBlank()
     */
    private $nombreTutor;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $poblacion;

    /**
     * @Assert\Regex(
     *     pattern="/(0[1-9]|5[0-2]|[0-4][0-9])[0-9]{3}/i",
     *     message="valid.cpostal"
     * )
     * @Assert\Length(
     *     max="5",
     *     min="5"
     * )
     * @ORM\Column(type="string", nullable=true)
     */
    private $codpostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provincia", inversedBy="empresas")
     */
    private $provincia;

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
     * @ORM\Column(type="string", length=100)
     * @Assert\Email(
     *     message="valid.correo"
     * )
     * @Assert\NotBlank()
     */
    private $correo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fct", mappedBy="empresa", cascade={"persist", "remove"})
     */
    private $fcts;

    public function __construct()
    {
        $this->fcts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * @param mixed $cif
     */
    public function setCif($cif): void
    {
        $this->cif = $cif;
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
    public function getNombreTutor()
    {
        return $this->nombreTutor;
    }

    /**
     * @param mixed $nombreTutor
     */
    public function setNombreTutor($nombreTutor): void
    {
        $this->nombreTutor = $nombreTutor;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param mixed $poblacion
     */
    public function setPoblacion($poblacion): void
    {
        $this->poblacion = $poblacion;
    }

    /**
     * @return mixed
     */
    public function getCodpostal()
    {
        return $this->codpostal;
    }

    /**
     * @param mixed $codpostal
     */
    public function setCodpostal($codpostal): void
    {
        $this->codpostal = $codpostal;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
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
        $fct->setEmpresa($this);
    }

    public function removeFct(Fct $fct)
    {
        $this->fcts->removeElement($fct);
        $fct->setEmpresa(null);
    }
}
