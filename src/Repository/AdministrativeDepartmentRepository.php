<?php

namespace App\Repository;

use App\Entity\AdministrativeDepartment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdministrativeDepartment>
 *
 * @method AdministrativeDepartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdministrativeDepartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdministrativeDepartment[]    findAll()
 * @method AdministrativeDepartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdministrativeDepartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdministrativeDepartment::class);
    }

    public function add(AdministrativeDepartment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AdministrativeDepartment $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AdministrativeDepartment[] Returns an array of AdministrativeDepartment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdministrativeDepartment
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
