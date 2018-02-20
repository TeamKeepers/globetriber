<?php



namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\ORM\Mapping as ORM;




/**
 * Description of Tribe
 *
 * @author Laeti
 * @ORM\Entity
 * @ORM\Table(name="tribe")
 */
class Tribe {
      /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * 
     */
    private $id;
    /**
     * @var int|null
     * @ORM\ManyToOne(targetEntity="User", inversedBy="myFriends")
     * @var User
     */
    private $idSender;
    
     /**
     * @var int|null
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendsWithMe")
     * @var User
     */
    private $idReceiver;
    
        public function __construct() {
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        
    }
    public function getId() {
        return $this->id;
    }

    public function getIdSender() : User {
        return $this->idSender;
    }

    public function getIdReceiver () : User {
        return $this->idReceiver;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setIdSender(User $idSender) {
        $this->idSender = $idSender;
        return $this;
    }

    public function setIdReceiver(User $idReceiver) {
        $this->idReceiver = $idReceiver;
        return $this;
    }


    
}
