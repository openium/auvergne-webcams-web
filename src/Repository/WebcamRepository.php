<?php

namespace App\Repository;

use App\Entity\Webcam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Webcam>
 * @method Webcam|null find($id, $lockMode = null, $lockVersion = null)
 * @method Webcam|null findOneBy(array $criteria, array $orderBy = null)
 * @method Webcam[]    findAll()
 * @method Webcam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebcamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Webcam::class);
    }

    public function save(Webcam $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Webcam $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
