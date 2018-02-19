<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repository;

use App\Entity\Product\Place;
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
}
