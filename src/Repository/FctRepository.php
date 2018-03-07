<?php

namespace App\Repository;

use App\Entity\Ciclo;
use App\Entity\Fct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FctRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fct::class);
    }


    public function findByNombre(int $pagina): Pagerfanta
    {
        $query = $this->createQueryBuilder('f')
            ->orderBy('f.id', 'ASC')
            ->getQuery()
        ;
        return $this->paginacion($query, $pagina);
    }

    public function findByCiclo(int $pagina, string $ciclo): Pagerfanta
    {
        $query = $this->createQueryBuilder('f')
            ->innerJoin('f.ciclo', 'c')
            ->addSelect('c')
            ->andWhere('c.id = :ciclo')
            ->setParameter('ciclo', $ciclo)
            ->orderBy('f.anio', 'ASC')
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
