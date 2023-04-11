<?php

namespace App\Repository;

use App\Entity\PostUEMF;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostUEMF>
 *
 * @method PostUEMF|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostUEMF|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostUEMF[]    findAll()
 * @method PostUEMF[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostUEMFRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostUEMF::class);
    }

    public function save(PostUEMF $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PostUEMF $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PostUEMF[] Returns an array of PostUEMF objects
//     */
   public function findByAuthor($value): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.Author = :val')
            ->setParameter('val', $value)
           ->orderBy('p.id', 'ASC')
           ->setMaxResults(10)
            ->getQuery()
            ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?PostUEMF
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
