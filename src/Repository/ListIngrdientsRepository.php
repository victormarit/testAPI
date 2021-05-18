<?php

namespace App\Repository;

use App\Entity\ListIngrdients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListIngrdients|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListIngrdients|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListIngrdients[]    findAll()
 * @method ListIngrdients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListIngrdientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListIngrdients::class);
    }

    // /**
    //  * @return ListIngrdients[] Returns an array of ListIngrdients objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListIngrdients
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
