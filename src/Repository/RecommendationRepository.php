<?php
namespace App\Repository;

use App\Entity\Recommendation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class RecommendationRepository extends ServiceEntityRepository 
{
    
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Recommendation::class);
    }
    
// A développer plus tard - afficher tous les commentaires ainsi que leurs auteur et le lieu concerné    
//    public function findCommentByUser()
//    {
//        return $this->createQueryBuilder('r')
//            ->leftjoin('r.user', 'u')
//            ->leftjoin('r.place', 'p')
//            ->addSelect('u')
//            ->addSelect('p')
//            ->getQuery()
//            ->getResult()
//        ;
//    }
}
