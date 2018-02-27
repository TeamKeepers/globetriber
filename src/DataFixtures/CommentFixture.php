<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;



class CommentFixture extends Fixture 
{
    public function load(ObjectManager $manager) {
        $comments = array();
        
        for ($i = 0; $i<50; $i++){
            $comments = new Comment();
//            A TERMINER SI NECESSAIRE
        }
    }
}

