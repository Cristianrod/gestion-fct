<?php

namespace App\Repository;

use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Profesor::class);
    }


    public function findByNombre()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.nombre', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
