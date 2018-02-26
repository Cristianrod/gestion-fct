<?php

namespace App\Repository;

use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Profesor::class);
    }


    public function findByNombre(int $pagina): Pagerfanta
    {
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.nombre', 'ASC')
            ->getQuery()
        ;

        return $this->paginador($query, $pagina);
    }

    public function paginador(Query $query, int $pagina)
    {
        $paginacion = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginacion = $paginacion->setMaxPerPage(4);
        $paginacion = $paginacion->setCurrentPage($pagina);

        return $paginacion;
    }

}
