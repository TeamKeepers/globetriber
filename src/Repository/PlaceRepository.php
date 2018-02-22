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
class PlaceRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {

        parent::__construct($registry, Place::class);
    }

    public function findByTypes($place) {
        $qb = $this->createQueryBuilder("p");
        $qb
                ->select('p.title, p.description')
                ->setMaxResults(10)
                ->setFirstResult(0)
        ;
        if (!empty($place['types'])) {
            $types = $place['types'];
            $expr = $qb->expr()->orX();
            $i = 0;
            foreach ($types as $type) {
                $expr->add($qb->expr()->like('p.types', ':type' . $i));
                $qb->setParameter(':type' . $i, $type);
                $i++;
            }
            $qb->orWhere($expr);
        }
    
        $criteria = ['accessibility', 'kitchen', 'desk', 'airConditioning', 'washingMachine', 'privateDesk', 'computer', 'parking', 'scanner', 'projector', 'printer', 'whiteBoard', 'napStation', 'terrace', 'freeDrink', 'freeSnack', 'internet', 'bed', 'town', 'country' ];

        $i = 0;
        foreach ($criteria as $criterium) {
            if (!empty($place[$criterium])) {
                $value = $place[$criterium];
                $qb->orWhere('p.' . $criterium . ' = :criterium' . $i);
                $qb->setParameter(':criterium' . $i, $value);
                $i++;
            }
        }

        
        $results = $qb->getQuery()->getResult();
        return $results;
    }

}
