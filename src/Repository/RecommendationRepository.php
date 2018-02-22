<?php
namespace App\Repository;

use App\Entity\Recommendation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class RecommendationRepository extends ServiceEntityRepository {
    
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Recommendation::class);
    }
    
    public function findCommentByUser($user)
    {
        return $this->createQueryBuilder('r')
            ->leftjoin('r.user', 'u')
            ->leftjoin('r.place', 'p')
            ->addSelect('u')
            ->addSelect('p')
            ->getQuery()
            ->getResult()
        ;
    }
}
