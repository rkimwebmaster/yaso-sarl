<?php

namespace App\Repository;

use App\Entity\CategorieImageGallerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieImageGallerie>
 *
 * @method CategorieImageGallerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieImageGallerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieImageGallerie[]    findAll()
 * @method CategorieImageGallerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieImageGallerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieImageGallerie::class);
    }

    public function save(CategorieImageGallerie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategorieImageGallerie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategorieImageGallerie[] Returns an array of CategorieImageGallerie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorieImageGallerie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
