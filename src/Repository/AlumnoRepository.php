<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AlumnoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alumno::class);
    }


    public function findByNombre(int $pagina): Pagerfanta
    {
        $query = $this->createQueryBuilder('a')
            ->orderBy('a.nombre', 'ASC')
            ->getQuery()
        ;
        return $this->paginacion($query, $pagina);
    }

    public function paginacion(Query $query, int $pagina)
    {
        $paginacion = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginacion = $paginacion->setMaxPerPage(5);
        $paginacion = $paginacion->setCurrentPage($pagina);

        return $paginacion;
    }
}
