<?php

namespace App\Repository;

use App\Entity\PersonalAssistanceService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PersonalAssistanceService>
 *
 * @method PersonalAssistanceService|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalAssistanceService|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalAssistanceService[]    findAll()
 * @method PersonalAssistanceService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalAssistanceServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalAssistanceService::class);
    }

    public function add(PersonalAssistanceService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PersonalAssistanceService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PersonalAssistanceService[] Returns an array of PersonalAssistanceService objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PersonalAssistanceService
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
