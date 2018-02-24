<?php

namespace App\Repository;

use App\Entity\Place;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SearchRepository extends ServiceEntityRepository 
{
    
    public function __construct(RegistryInterface $registry) 
    {
        foreach ($_POST as $key => $value) {
            if ($value['Recherche'] == 'username') {
                parent::__construct($registry, User::class);
            } else {
                parent::__construct($registry, Place::class);
            }
        }
        
    }

    public function findByPax($username) 
    {
        foreach ($_POST as $key => $value) {
            if ($value['Recherche'] == 'username') {
                $qb = $this->createQueryBuilder('u');
                
                $qb
                    ->select('u.username')
                    ->where('u.username LIKE :username')->setParameter(':username', '%'.$username.'%')
                    ->orderBy('u.username', 'ASC');
                
            } else {
                $qb = $this->createQueryBuilder('p');
                $qb
                    ->select('p.title, p.description')
                    ->where('p.title LIKE :places')->setParameter(':places', '%'.$username.'%')
                    ->orderBy('p.title', 'ASC');
            }
        }
        
        $results = $qb->getQuery()->getResult();
        return $results;
    }

}