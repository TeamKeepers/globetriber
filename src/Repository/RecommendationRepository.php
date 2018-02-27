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
    
    public function findByUser($data, $user){
         $qb = $this->createQueryBuilder("r");
        $qb
                
                ->where('r.user = :user')
                ->setParameter('user', $user)
                ->leftJoin('r.place', 'p')
                ->addSelect('p')
                ->setMaxResults(10)
                ->setFirstResult(0)
        ;
        
        $locations = ['town', 'country'];
        $i = 0;
        $expr = $qb->expr()->orX();
            
        foreach ($locations as $location){ 
            
            if(!empty($data[$location])){
                $value = $data[$location];
                $expr->add($qb->expr()->eq('p.' .$location, ':location' . $i));
                 $qb->setParameter(':location' . $i, $value);
                $i++; 
            }       
        }
        $qb->andWhere($expr);
        $results = $qb->getQuery()->getResult();
        return $results;
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
