<?php

namespace App\Repository;

use App\Entity\StageEtudiant;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Client\Response;

/**
 * @extends ServiceEntityRepository<StageEtudiant>
 *
 * @method StageEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method StageEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method StageEtudiant[]    findAll()
 * @method StageEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StageEtudiant::class);
    }

    public function save(StageEtudiant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StageEtudiant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $infoStage = $entityManager->getRepository(StageEtudiant::class)->find($id);

        if (!$infoStage) {
            throw $this->createNotFoundException(
                'Nothing found for '.$id
            );
        }

        $infoStage->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $infoStage->getId()
        ]);
    }

//    /**
//     * @return StageEtudiant[] Returns an array of StageEtudiant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StageEtudiant
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
