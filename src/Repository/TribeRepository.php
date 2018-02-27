<?php

namespace App\Repository;

use App\Entity\Tribe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TribeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tribe::class);
    }
    
    public function askFriendship($id_sender, $id_receiver)
    {
        return $this->createQueryBuilder('t')
            ->where('t.id_sender_id = :id_sender AND t.id_receiver_id = :id_receiver')
            ->orWhere('t.id_sender_id = :id_receiver AND t.id_receiver_id = :id_sender')
            ->setParameter('id_sender', $id_sender)
            ->setParameter('id_receiver', $id_receiver)
            ->getQuery()
            ->getResult();
    }
    
    public function loadFriendsList() {
        return $this->getAll();
    }
}

