<?php

namespace App\Repository;

use App\Entity\Peinture;
use App\Entity\Categorie;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Peinture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peinture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peinture[]    findAll()
 * @method Peinture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeintureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Peinture::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Peinture $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Peinture $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    // /**
    //  * @return Peinture[] Returns an array of Peinture objects
    //  */

    public function lastTree()
    {
        return $this->createQueryBuilder('p')
            // ->andWhere('p.exampleField = :val')
            // ->setParameter('val', $value)
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    /**
     * @Return Peinture[] Returns an array of Peinture objects
     */
    public function findAllPorfolio(Categorie $categorie): array
    {
        return $this->createQueryBuilder('p')
            ->where(':categorie MEMBER of p.categorie')
            ->andWhere('p.portfolio = TRUE')
            ->setParameter('categorie', $categorie)
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }
}
