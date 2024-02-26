<?php

namespace App\Repository;

use App\Entity\Reviews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReviewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reviews::class);
    }

    /**
     * Retourne les avis non approuvés
     *
     * @return Reviews[]
     */
    public function findUnapprovedReviews(): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.isApproved = :approved')
            ->setParameter('approved', false)
            ->getQuery()
            ->getResult();
    }
}
