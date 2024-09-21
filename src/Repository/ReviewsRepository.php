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
     * Trouve et renvoie tous les avis approuvés.
     *
     * @return Reviews[] Les avis approuvés
     */
    public function findApprovedReviews(): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.isApproved = :approved')
            ->setParameter('approved', true)
            ->getQuery()
            ->getResult();
    }
}
