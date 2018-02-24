<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AlumnoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alumno::class);
    }


    public function findByNombre()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
