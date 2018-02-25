<?php

namespace App\Repository;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;

class FriendshipRepository 
{
    public function __construct(RegistryInterface $registry) 
    {
        parent::__construct($registry, User::class);
    }
    
    public function askFriendship($id) {
        
        
        
    }
}

