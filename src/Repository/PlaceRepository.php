<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Entity\Place;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Description of PlaceRepository
 *
 * @author Laeti
 */
class PlaceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry){
        
        parent::__construct($registry, Place::class);
    }
    
    public function findUserQuery($address = null){
        $qb = $this->createQueryBuilder("p");
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb
                ->select('p.title, p.description, p.types.p.bed')
                ->from('\Entity\Place','p')
                ->where('p.types = :types')
                ->where('\Symfony\Component\Form\Extension\Core\Type\CheckboxType::class == true')
                // where 
                //    $qb->expr()andX('\Symfony\Component\Form\Extension\Core\Type\CheckboxType::class == true')
                ->setMaxResults(10)
                ->setFirstResult(0)
            ;
        if($address !=null){
            $qb
                    ->andWhere('p.address = :address')
                    ->setParameter('address', $address)
                ;
        }
        
        $result = $qb->getQuery()->getResult();
        return $result;
        
            
    }
    
    
}
